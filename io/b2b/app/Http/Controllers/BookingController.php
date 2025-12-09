<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Booking::with('user');

        // Apply filters
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('type')) {
            $query->where('booking_type', $request->type);
        }

        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        // Get paginated results
        $bookings = $query->latest()->paginate(15);

        return view('bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // Pre-fill form if coming from a specific service
        $prefill = [];
        if ($request->has('type')) {
            $prefill['booking_type'] = $request->type;
        }
        if ($request->has('service')) {
            $prefill['service_name'] = $request->service;
        }

        return view('bookings.create', compact('prefill'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'booking_type' => 'required|in:visa,tour,hotel,cruise,documentation',
            'service_name' => 'required|string|max:255',
            'description' => 'required|string',
            'amount' => 'required|numeric|min:0',
            'currency' => 'required|in:NGN,USD,EUR,GBP',
            'travel_date' => 'nullable|date|after_or_equal:today',
            'return_date' => 'nullable|date|after:travel_date',
            'passengers' => 'nullable|integer|min:1',
            'status' => 'required|in:pending,confirmed,completed,cancelled',
            'special_requirements' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        // Generate reference number if not provided
        if (!$request->filled('reference_number')) {
            $validated['reference_number'] = $this->generateReferenceNumber();
        } else {
            $validated['reference_number'] = $request->reference_number;
        }

        // Set user ID
        $validated['user_id'] = Auth::id();

        // Convert dates
        if ($request->filled('travel_date')) {
            $validated['travel_date'] = $request->travel_date;
        }
        if ($request->filled('return_date')) {
            $validated['return_date'] = $request->return_date;
        }

        $booking = Booking::create($validated);

        return redirect()->route('bookings.show', $booking)
            ->with('success', 'Booking created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        $booking->load('user');
        return view('bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        return view('bookings.edit', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'booking_type' => 'required|in:visa,tour,hotel,cruise,documentation',
            'service_name' => 'required|string|max:255',
            'description' => 'required|string',
            'amount' => 'required|numeric|min:0',
            'currency' => 'required|in:NGN,USD,EUR,GBP',
            'travel_date' => 'nullable|date',
            'return_date' => 'nullable|date|after:travel_date',
            'passengers' => 'nullable|integer|min:1',
            'status' => 'required|in:pending,confirmed,completed,cancelled',
            'special_requirements' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        // Convert dates
        if ($request->filled('travel_date')) {
            $validated['travel_date'] = $request->travel_date;
        } else {
            $validated['travel_date'] = null;
        }
        
        if ($request->filled('return_date')) {
            $validated['return_date'] = $request->return_date;
        } else {
            $validated['return_date'] = null;
        }

        $booking->update($validated);

        return redirect()->route('bookings.show', $booking)
            ->with('success', 'Booking updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('bookings.index')
            ->with('success', 'Booking deleted successfully!');
    }

    /**
     * Generate invoice for the booking.
     */
    public function invoice(Booking $booking)
    {
        $booking->load('user');
        
        // For now, we'll redirect to a simple invoice view
        // In a real application, you might want to generate a PDF
        return view('bookings.invoice', compact('booking'));
    }

    /**
     * Update booking status.
     */
    public function updateStatus(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled',
        ]);

        $booking->update($validated);

        return redirect()->route('bookings.show', $booking)
            ->with('success', 'Booking status updated successfully!');
    }

    /**
     * Generate a unique reference number.
     */
    private function generateReferenceNumber()
    {
        do {
            $timestamp = now()->format('YmdHis');
            $random = strtoupper(Str::random(4));
            $reference = "BK{$timestamp}{$random}";
        } while (Booking::where('reference_number', $reference)->exists());

        return $reference;
    }

    /**
     * Get booking statistics for dashboard.
     */
    public function statistics()
    {
        $stats = [
            'total' => Booking::count(),
            'pending' => Booking::where('status', 'pending')->count(),
            'confirmed' => Booking::where('status', 'confirmed')->count(),
            'completed' => Booking::where('status', 'completed')->count(),
            'cancelled' => Booking::where('status', 'cancelled')->count(),
            'total_amount' => Booking::sum('amount'),
            'this_month' => Booking::whereMonth('created_at', now()->month)->count(),
            'this_month_amount' => Booking::whereMonth('created_at', now()->month)->sum('amount'),
        ];

        return response()->json($stats);
    }

    /**
     * Export bookings to CSV.
     */
    public function export(Request $request)
    {
        $query = Booking::with('user');

        // Apply filters
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('type')) {
            $query->where('booking_type', $request->type);
        }

        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $bookings = $query->get();

        $filename = 'bookings_' . now()->format('Y-m-d_H-i-s') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function() use ($bookings) {
            $file = fopen('php://output', 'w');
            
            // Add headers
            fputcsv($file, [
                'Reference Number',
                'Customer Name',
                'Customer Email',
                'Booking Type',
                'Service Name',
                'Amount',
                'Currency',
                'Status',
                'Travel Date',
                'Return Date',
                'Passengers',
                'Created Date'
            ]);

            // Add data
            foreach ($bookings as $booking) {
                fputcsv($file, [
                    $booking->reference_number,
                    $booking->user->name,
                    $booking->user->email,
                    ucfirst($booking->booking_type),
                    $booking->service_name,
                    $booking->amount,
                    $booking->currency,
                    ucfirst($booking->status),
                    $booking->travel_date ? $booking->travel_date->format('Y-m-d') : '',
                    $booking->return_date ? $booking->return_date->format('Y-m-d') : '',
                    $booking->passengers,
                    $booking->created_at->format('Y-m-d H:i:s')
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
