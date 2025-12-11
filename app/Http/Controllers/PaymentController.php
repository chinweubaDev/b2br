<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Hotel;
use App\Models\TourPackage;
use App\Models\VisaService;
use App\Models\Cruise;
use App\Models\DocumentationService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use App\Mail\TransactionReceiptMail;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    /**
     * Show payment options for a specific service.
     */
    public function showOptions($serviceType, $serviceId)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to access payment options.');
        }

        $service = $this->getService($serviceType, $serviceId);
        
        if (!$service) {
            return redirect()->back()->with('error', 'Service not found.');
        }
 
        $amount = $this->getServiceAmount($service, $serviceType);
             $serviceName = $this->getServicename($service, $serviceType) || 'jjd';

        return view('payments.options', compact('service', 'serviceType', 'serviceId', 'amount', 'serviceName'));
    }

    /**
     * Show payment options for a specific service.
     */
    public function showPaymentOptions(Request $request, $serviceType, $serviceId)
    {
        $service = $this->getService($serviceType, $serviceId);
        
        if (!$service) {
            return redirect()->back()->with('error', 'Service not found.');
        }

        $amount = $this->getServiceAmount($service, $serviceType);
        $serviceName = $this->getServiceName($service, $serviceType) || 'jjd';

        return view('payments.options', compact('service', 'serviceType', 'serviceId', 'amount', 'serviceName'));
    }

    /**
     * Process bank transfer payment.
     */
    public function bankTransfer(Request $request, $serviceType, $serviceId)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to process payments.');
        }

        $request->validate([
            'amount' => 'required|numeric|min:0',
        ]);

        $service = $this->getService($serviceType, $serviceId);
        
        if (!$service) {
            return redirect()->back()->with('error', 'Service not found.');
        }

        $amount = $request->amount;
        $serviceName = $this->getServiceName($service, $serviceType) || 'jjd';

        // Create payment record
        $payment = Payment::create([
            'user_id' => Auth::id(),
            'service_type' => $serviceType,
            'service_id' => $serviceId,
            'service_name' => $serviceName,
            'amount' => $amount,
            'currency' => 'NGN',
            'payment_method' => 'bank_transfer',
            'payment_status' => 'pending',
            'bank_transfer_details' => [
                'bank_name' => 'Royeli Travel Bank',
                'account_name' => 'Royeli Tours & Travel Ltd',
                'account_number' => '1234567890',
                'sort_code' => '123456',
                'reference' => 'PAY-' . strtoupper(uniqid()) . '-' . time(),
            ],
        ]);

        return redirect()->route('payment.bank-transfer.show', [$serviceType, $serviceId]);
    }

    /**
     * Show bank transfer details.
     */
    public function showBankTransfer($serviceType, $serviceId)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to access payment options.');
        }

        $service = $this->getService($serviceType, $serviceId);
        
        if (!$service) {
            return redirect()->back()->with('error', 'Service not found.');
        }

        $amount = $this->getServiceAmount($service, $serviceType);
        $serviceName = $this->getServiceName($service, $serviceType);

        // Create payment record for bank transfer
        $payment = Payment::create([
            'user_id' => Auth::id(),
            'service_type' => $serviceType,
            'service_id' => $serviceId,
            'service_name' => $serviceName,
            'amount' => $amount,
            'currency' => 'NGN',
            'payment_method' => 'bank_transfer',
            'payment_status' => 'pending',
            'bank_transfer_details' => [
                'bank_name' => 'Royeli Travel Bank',
                'account_name' => 'Royeli Tours & Travel Ltd',
                'account_number' => '1234567890',
                'sort_code' => '123456',
                'reference' => 'PAY-' . strtoupper(uniqid()) . '-' . time(),
            ],
        ]);

        return view('payments.bank-transfer', compact('payment'));
    }

    /**
     * Process Paystack payment.
     */
    public function paystack(Request $request, $serviceType, $serviceId)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to process payments.');
        }

        $request->validate([
            'amount' => 'required|numeric|min:0',
        ]);

        $service = $this->getService($serviceType, $serviceId);
        if (!$service) {
            return redirect()->back()->with('error', 'Service not found.');
        }

        $amount = $request->amount;
        $serviceName = $this->getServiceName($service, $serviceType);
        $user = Auth::user();
        $reference = 'PAY-' . strtoupper(Str::random(8)) . '-' . time();

        // Create payment record
        $payment = Payment::create([
            'user_id' => $user->id,
            'service_type' => $serviceType,
            'service_id' => $serviceId,
            'service_name' => $serviceName,
            'amount' => $amount,
            'currency' => 'NGN',
            'payment_method' => 'paystack',
            'payment_status' => 'pending',
            'payment_reference' => $reference,
        ]);

        // Initialize Paystack payment
        $paystackSecret = config('paystack.secretKey');
        $paystackUrl = config('paystack.paymentUrl') . '/transaction/initialize';
        $callbackUrl = config('paystack.callbackUrl');

        $response = \Http::withToken($paystackSecret)
            ->post($paystackUrl, [
                'email' => $user->email,
                'amount' => $amount * 100,
                'reference' => $reference,
                'callback_url' => $callbackUrl,
            ]);

        $data = $response->json();

        if ($response->successful() && isset($data['data']['authorization_url'])) {
            return redirect($data['data']['authorization_url']);
        } else {
            return back()->with('error', $data['message'] ?? 'Paystack error');
        }
    }

    /**
     * Show Paystack payment form.
     */
    public function showPaystack($serviceType, $serviceId)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to access payment options.');
        }

        $service = $this->getService($serviceType, $serviceId);
        if (!$service) {
            return redirect()->back()->with('error', 'Service not found.');
        }

        $amount = $this->getServiceAmount($service, $serviceType);
        $serviceName = $this->getServiceName($service, $serviceType);
        $user = Auth::user();
        $reference = 'PAY-' . strtoupper(Str::random(8)) . '-' . time();

        // Create payment record for Paystack
        $payment = Payment::create([
            'user_id' => $user->id,
            'service_type' => $serviceType,
            'service_id' => $serviceId,
            'service_name' => $serviceName,
            'amount' => $amount,
            'currency' => 'NGN',
            'payment_method' => 'paystack',
            'payment_status' => 'pending',
            'payment_reference' => $reference,
        ]);

        // Initialize Paystack payment
        $paystackSecret = config('paystack.secretKey');
        $paystackUrl = config('paystack.paymentUrl') . '/transaction/initialize';
        $callbackUrl = config('paystack.callbackUrl');

        $response = \Http::withToken($paystackSecret)
            ->post($paystackUrl, [
                'email' => $user->email,
                'amount' => $amount * 100,
                'reference' => $reference,
                'callback_url' => $callbackUrl,
            ]);

        $data = $response->json();

        if ($response->successful() && isset($data['data']['authorization_url'])) {
            return redirect($data['data']['authorization_url']);
        } else {
            return back()->with('error', $data['message'] ?? 'Paystack error');
        }
    }

    /**
     * Show bank transfer details.
     */
    public function showBankTransferDetails(Payment $payment)
    {
        if ($payment->user_id !== Auth::id()) {
            abort(403);
        }

        return view('payments.bank-transfer', compact('payment'));
    }

    /**
     * Paystack callback after payment.
     */
    public function paystackCallback(Request $request)
    {
        $reference = $request->query('reference');
        $paystackSecret = config('paystack.secretKey');
        $verifyUrl = config('paystack.paymentUrl') . '/transaction/verify/' . $reference;

        $response = \Http::withToken($paystackSecret)->get($verifyUrl);
        $data = $response->json();

        $payment = Payment::where('payment_reference', $reference)->first();

        if ($response->successful() && isset($data['data']) && $data['data']['status'] === 'success') {
            if ($payment) {
                $payment->update(['payment_status' => 'completed']);
                // Send receipt email to user and admin
                Mail::to($payment->user->email)->send(new TransactionReceiptMail($payment, $payment->user));
                Mail::to('hi@royelimytravel.com')->send(new TransactionReceiptMail($payment, $payment->user));
            }
            return redirect()->route('payment.success', $payment ? $payment->id : null);
        } else {
            if ($payment) {
                $payment->update(['payment_status' => 'failed']);
            }
            return redirect()->route('payment.failed')->with('error', $data['message'] ?? 'Verification failed');
        }
    }

    /**
     * Show payment success page.
     */
    public function success(Payment $payment)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to view payment details.');
        }

        if ($payment->user_id !== Auth::id()) {
            abort(403);
        }

        // Award points for successful payment
        $user = $payment->user;
        $user->increment('points_balance', 100);

        // Send receipt email to user and admin (in case not already sent)
        if ($payment->payment_status === 'completed') {
            Mail::to($user->email)->send(new TransactionReceiptMail($payment, $user));
            Mail::to('hi@royelimytravel.com')->send(new TransactionReceiptMail($payment, $user));
        }

        return view('payments.success', compact('payment'));
    }

    /**
     * Show payment failed page.
     */
    public function failed()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to access payment pages.');
        }

        return view('payments.failed');
    }

    /**
     * Show user's transaction history.
     */
    public function history()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to view transaction history.');
        }

        $payments = Auth::user()->payments()->latest()->paginate(10);
        
        return view('payments.history', compact('payments'));
    }

    /**
     * Show payment details.
     */
    public function details(Payment $payment)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to view payment details.');
        }

        if ($payment->user_id !== Auth::id()) {
            abort(403);
        }

        return view('payments.details', compact('payment'));
    }

    /**
     * Get service based on type and ID.
     */
    private function getService($serviceType, $serviceId)
    {
        return match($serviceType) {
            'hotel' => Hotel::find($serviceId),
            'tour' => TourPackage::find($serviceId),
            'visa' => VisaService::find($serviceId),
            'cruise' => Cruise::find($serviceId),
            'documentation' => DocumentationService::find($serviceId),
            default => null,
        };
    }

    /**
     * Get service amount based on type.
     */
    private function getServiceAmount($service, $serviceType)
    {
        return match($serviceType) {
            'hotel' => $service->b2b_rate ?? $service->standard_rate,
            'tour' => $service->b2b_rate ?? $service->standard_rate,
            'visa' => $service->b2b_rate ?? $service->standard_rate,
            'cruise' => $service->b2b_rate ?? $service->standard_rate,
            'documentation' => $service->b2b_rate ?? $service->standard_rate,
            default => 0,
        };
    }

    /**
     * Get service name.
     */
    private function getServiceName($service, $serviceType)
    {
        return match($serviceType) {
            'hotel' => $service->name,
            'tour' => $service->name,
            'visa' => $service->name,
            'cruise' => $service->name,
            'documentation' => $service->service_name,
            default => 'Unknown Service',
        };
    }

    public function walletPay(Request $request, $serviceType, $serviceId)
    {
        $user = Auth::user();
        $service = $this->getService($serviceType, $serviceId);
        if (!$service) {
            return redirect()->back()->with('error', 'Service not found.');
        }
        $amount = $this->getServiceAmount($service, $serviceType);
        $serviceName = $this->getServiceName($service, $serviceType);
        if ($user->wallet_balance < $amount) {
            return redirect()->back()->with('error', 'Insufficient wallet balance. Please fund your wallet.');
        }
        // Deduct from wallet
        $user->decrement('wallet_balance', $amount);
        // Create payment record
        $payment = Payment::create([
            'user_id' => $user->id,
            'service_type' => $serviceType,
            'service_id' => $serviceId,
            'service_name' => $serviceName,
            'amount' => $amount,
            'currency' => 'NGN',
            'payment_method' => 'wallet',
            'payment_status' => 'completed',
        ]);
        // Award points
        $user->increment('points_balance', 100);
        return redirect()->route('payment.success', $payment->id)->with('success', 'Payment successful!');
    }
}
