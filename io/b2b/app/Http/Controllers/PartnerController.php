<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\Booking;
use App\Models\PartnerTransaction;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = Partner::with(['bookings', 'transactions'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        $stats = [
            'total' => Partner::count(),
            'active' => Partner::where('status', 'active')->count(),
            'pending' => Partner::where('status', 'pending')->count(),
            'suspended' => Partner::where('status', 'suspended')->count(),
        ];

        return view('partners.index', compact('partners', 'stats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('partners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'email' => 'required|email|unique:partners,email',
            'phone' => 'required|string|max:20',
            'website' => 'nullable|url|max:255',
            'address' => 'required|string',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'postal_code' => 'nullable|string|max:20',
            'business_type' => 'required|in:travel_agent,tour_operator,corporate,individual',
            'license_number' => 'nullable|string|max:100',
            'tax_id' => 'nullable|string|max:100',
            'commission_rate' => 'required|numeric|min:0|max:100',
            'credit_limit' => 'required|numeric|min:0',
            'payment_terms' => 'required|in:immediate,7_days,15_days,30_days',
            'services_offered' => 'nullable|array',
            'specializations' => 'nullable|string',
            'notes' => 'nullable|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['status'] = 'pending';
        $validated['current_balance'] = 0;

        Partner::create($validated);

        return redirect()->route('partners.index')->with('success', 'Partner created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Partner $partner)
    {
        $partner->load(['bookings', 'transactions']);
        
        $recentBookings = $partner->bookings()
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
            
        $recentTransactions = $partner->transactions()
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        $stats = [
            'total_bookings' => $partner->bookings()->count(),
            'total_revenue' => $partner->bookings()->sum('amount'),
            'total_commission' => $partner->transactions()->where('transaction_type', 'commission')->sum('amount'),
            'pending_balance' => $partner->current_balance,
        ];

        return view('partners.show', compact('partner', 'recentBookings', 'recentTransactions', 'stats'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner)
    {
        return view('partners.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partner $partner)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'email' => 'required|email|unique:partners,email,' . $partner->id,
            'phone' => 'required|string|max:20',
            'website' => 'nullable|url|max:255',
            'address' => 'required|string',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'postal_code' => 'nullable|string|max:20',
            'business_type' => 'required|in:travel_agent,tour_operator,corporate,individual',
            'license_number' => 'nullable|string|max:100',
            'tax_id' => 'nullable|string|max:100',
            'commission_rate' => 'required|numeric|min:0|max:100',
            'credit_limit' => 'required|numeric|min:0',
            'status' => 'required|in:active,inactive,suspended,pending',
            'payment_terms' => 'required|in:immediate,7_days,15_days,30_days',
            'services_offered' => 'nullable|array',
            'specializations' => 'nullable|string',
            'notes' => 'nullable|string',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $partner->update($validated);

        return redirect()->route('partners.show', $partner)->with('success', 'Partner updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner)
    {
        $partner->delete();

        return redirect()->route('partners.index')->with('success', 'Partner deleted successfully.');
    }

    public function dashboard(Partner $partner)
    {
        $partner->load(['bookings', 'transactions']);

        $recentBookings = $partner->bookings()
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        $recentTransactions = $partner->transactions()
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        $monthlyStats = $this->getMonthlyStats($partner);

        return view('partners.dashboard', compact('partner', 'recentBookings', 'recentTransactions', 'monthlyStats'));
    }

    public function updateStatus(Request $request, Partner $partner)
    {
        $validated = $request->validate([
            'status' => 'required|in:active,inactive,suspended,pending',
        ]);

        $partner->update($validated);

        return redirect()->back()->with('success', 'Partner status updated successfully.');
    }

    public function processPayment(Request $request, Partner $partner)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0',
            'description' => 'required|string',
            'payment_method' => 'required|string',
        ]);

        $balanceBefore = $partner->current_balance;
        $balanceAfter = $balanceBefore - $validated['amount'];

        if ($balanceAfter < 0) {
            return redirect()->back()->with('error', 'Insufficient balance for this payment.');
        }

        $transaction = PartnerTransaction::create([
            'partner_id' => $partner->id,
            'transaction_type' => 'payment',
            'amount' => $validated['amount'],
            'balance_before' => $balanceBefore,
            'balance_after' => $balanceAfter,
            'reference_number' => 'PAY-' . strtoupper(Str::random(8)),
            'description' => $validated['description'],
            'status' => 'completed',
            'metadata' => [
                'payment_method' => $validated['payment_method'],
            ],
            'processed_at' => now(),
        ]);

        $partner->update(['current_balance' => $balanceAfter]);

        return redirect()->back()->with('success', 'Payment processed successfully.');
    }

    private function getMonthlyStats(Partner $partner)
    {
        $currentMonth = now()->startOfMonth();
        $lastMonth = now()->subMonth()->startOfMonth();

        return [
            'current_month' => [
                'bookings' => $partner->bookings()->whereMonth('created_at', $currentMonth->month)->count(),
                'revenue' => $partner->bookings()->whereMonth('created_at', $currentMonth->month)->sum('amount'),
                'commission' => $partner->transactions()->where('transaction_type', 'commission')->whereMonth('created_at', $currentMonth->month)->sum('amount'),
            ],
            'last_month' => [
                'bookings' => $partner->bookings()->whereMonth('created_at', $lastMonth->month)->count(),
                'revenue' => $partner->bookings()->whereMonth('created_at', $lastMonth->month)->sum('amount'),
                'commission' => $partner->transactions()->where('transaction_type', 'commission')->whereMonth('created_at', $lastMonth->month)->sum('amount'),
            ],
        ];
    }
}
