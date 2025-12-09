<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WalletTransaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use App\Mail\TransactionReceiptMail;
use Illuminate\Support\Facades\Mail;

class WalletController extends Controller
{
    public function showFundForm()
    {
        $user = Auth::user();
        return view('wallet.fund', compact('user'));
    }

    public function initiateFund(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1000',
        ]);
        $user = Auth::user();
        $amount = $request->amount;
        $reference = 'WALLET-' . strtoupper(Str::random(8)) . '-' . time();

        // Create wallet transaction (pending)
        $transaction = WalletTransaction::create([
            'user_id' => $user->id,
            'amount' => $amount,
            'type' => 'credit',
            'reference' => $reference,
            'status' => 'pending',
        ]);

        // Initialize Paystack payment
        $paystackSecret = config('paystack.secretKey');
        $paystackUrl = config('paystack.paymentUrl') . '/transaction/initialize';
        $callbackUrl = config('paystack.callbackUrl') ?? route('wallet.callback');

        $response = Http::withToken($paystackSecret)
            ->post($paystackUrl, [
                'email' => $user->email,
                'amount' => $amount * 100,
                'reference' => $reference,
                'callback_url' => $callbackUrl,
                'metadata' => [
                    'wallet_transaction_id' => $transaction->id,
                ],
            ]);

        $data = $response->json();

        if ($response->successful() && isset($data['data']['authorization_url'])) {
            return redirect($data['data']['authorization_url']);
        } else {
            return back()->with('error', $data['message'] ?? 'Paystack error');
        }
    }

    public function paystackCallback(Request $request)
    {
        $reference = $request->query('reference', $request->reference);
        $paystackSecret = config('paystack.secretKey');
        $verifyUrl = config('paystack.paymentUrl') . '/transaction/verify/' . $reference;

        $response = Http::withToken($paystackSecret)->get($verifyUrl);
        $data = $response->json();

        $transaction = WalletTransaction::where('reference', $reference)->first();
        if (!$transaction) {
            return redirect()->route('wallet.fund')->with('error', 'Transaction not found.');
        }

        if ($response->successful() && isset($data['data']) && $data['data']['status'] === 'success') {
            $transaction->update(['status' => 'completed']);
            $user = $transaction->user;
            $user->increment('wallet_balance', $transaction->amount);
            // Send receipt email to user and admin
            Mail::to($user->email)->send(new TransactionReceiptMail($transaction, $user));
            Mail::to('hi@royelimytravel.com')->send(new TransactionReceiptMail($transaction, $user));
            return redirect()->route('dashboard')->with('success', 'Wallet funded successfully!');
        } else {
            $transaction->update(['status' => 'failed']);
            return redirect()->route('wallet.fund')->with('error', $data['message'] ?? 'Verification failed');
        }
    }
} 