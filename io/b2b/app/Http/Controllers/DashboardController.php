<?php

namespace App\Http\Controllers;

use App\Models\VisaService;
use App\Models\TourPackage;
use App\Models\Hotel;
use App\Models\Cruise;
use App\Models\Booking;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // Get counts for dashboard statistics
        $visaCount = VisaService::where('is_active', true)->count();
        $tourCount = TourPackage::where('is_active', true)->count();
        $hotelCount = Hotel::where('is_active', true)->count();
        $cruiseCount = Cruise::where('is_active', true)->count();
        
        // Get recent bookings
        $recentBookings = Booking::with('user')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        
        // Get featured tour packages
        $featuredTours = TourPackage::where('is_featured', true)
            ->where('is_active', true)
            ->limit(2)
            ->get();
        
        // Get popular visa services (based on bookings)
        $popularVisas = VisaService::with('country')
            ->where('is_active', true)
            ->limit(2)
            ->get();
        
        return view('dashboard', compact(
            'visaCount',
            'tourCount', 
            'hotelCount',
            'cruiseCount',
            'recentBookings',
            'featuredTours',
            'popularVisas',
            'user'
        ));
    }
}
