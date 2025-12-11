<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisaService;
use App\Models\Country;
use App\Models\ServiceImage;
use Illuminate\Support\Facades\Storage;

class VisaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = VisaService::with('country')->where('is_active', true);

        // Search filter
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('service_name', 'like', "%{$search}%")
                  ->orWhere('visa_type', 'like', "%{$search}%")
                  ->orWhereHas('country', function($countryQuery) use ($search) {
                      $countryQuery->where('name', 'like', "%{$search}%");
                  });
            });
        }

        // Country filter
        if ($request->filled('country')) {
            $query->whereHas('country', function($countryQuery) use ($request) {
                $countryQuery->where('name', 'like', "%{$request->country}%");
            });
        }

        // Visa type filter
        if ($request->filled('type')) {
            $query->where('visa_type', 'like', "%{$request->type}%");
        }

        // Processing time filter
        if ($request->filled('processing')) {
            $processing = $request->processing;
            if ($processing === 'express') {
                $query->where('processing_time', 'like', '%day%');
            } elseif ($processing === 'standard') {
                $query->where('processing_time', 'like', '%week%');
            } elseif ($processing === 'extended') {
                $query->where('processing_time', 'like', '%month%');
            }
        }

        $visas = $query->get();
        
        // Get unique countries and visa types for filter dropdowns
        $countries = VisaService::with('country')
            ->where('is_active', true)
            ->get()
            ->pluck('country.name')
            ->unique()
            ->sort()
            ->values();
            
        $visaTypes = VisaService::where('is_active', true)
            ->distinct()
            ->pluck('visa_type')
            ->sort()
            ->values();

        return view('visas.index', compact('visas', 'countries', 'visaTypes'));
    }
  public function adminindex()
    {
        $visas = VisaService::with('country')->where('is_active', true)->get();
        return view('admin.visas.index', compact('visas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::where('is_active', true)->get();
        return view('admin.visas.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'country_id' => 'required|exists:countries,id',
            'service_name' => 'required|string',
            'visa_type' => 'required|string|max:255',
            'requirements' => 'required|string',
            'processing_time' => 'required|string',
            'standard_rate' => 'required|numeric|min:0',
            'b2b_rate' => 'required|numeric|min:0',
            'cost_includes' => 'nullable|string',
            'additional_notes' => 'nullable|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'extra_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_captions.*' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('visas', 'public');
        }

        $visa = VisaService::create($validated);

        // Handle extra images
        if ($request->hasFile('extra_images')) {
            foreach ($request->file('extra_images') as $index => $image) {
                if ($image && $image->isValid()) {
                    $imagePath = $image->store('visas/extra', 'public');
                    $caption = $request->input("image_captions.{$index}", '');
                    
                    ServiceImage::create([
                        'service_type' => 'visa',
                        'service_id' => $visa->id,
                        'image_path' => $imagePath,
                        'caption' => $caption,
                        'sort_order' => $index,
                        'is_active' => true,
                    ]);
                }
            }
        }

        return redirect()->route('admin.visas.index')->with('success', 'Visa service created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(VisaService $visa)
    {
        return view('visas.show', compact('visa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VisaService $visa)
    {
        $countries = Country::where('is_active', true)->get();
        return view('admin.visas.edit', compact('visa', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VisaService $visa)
    {
        $validated = $request->validate([
            'country_id' => 'required|exists:countries,id',
            'service_name' => 'required|string',
            'visa_type' => 'required|string|max:255',
            'requirements' => 'required|string',
            'processing_time' => 'required|string',
            'standard_rate' => 'required|numeric|min:0',
            'b2b_rate' => 'required|numeric|min:0',
            'cost_includes' => 'nullable|string',
            'additional_notes' => 'nullable|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'extra_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_captions.*' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('featured_image')) {
            // Delete old featured image if exists
            if ($visa->featured_image) {
                Storage::disk('public')->delete($visa->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('visas', 'public');
        }

        $visa->update($validated);

        // Handle extra images
        if ($request->hasFile('extra_images')) {
            foreach ($request->file('extra_images') as $index => $image) {
                if ($image && $image->isValid()) {
                    $imagePath = $image->store('visas/extra', 'public');
                    $caption = $request->input("image_captions.{$index}", '');
                    
                    ServiceImage::create([
                        'service_type' => 'visa',
                        'service_id' => $visa->id,
                        'image_path' => $imagePath,
                        'caption' => $caption,
                        'sort_order' => $index,
                        'is_active' => true,
                    ]);
                }
            }
        }
        return redirect()->route('admin.visas.index')->with('success', 'Visa service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VisaService $visa)
    {
        // Delete featured image
        if ($visa->featured_image) {
            Storage::disk('public')->delete($visa->featured_image);
        }

        // Delete extra images
        foreach ($visa->images as $image) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
        }

        $visa->delete();

        return redirect()->route('visas.index')->with('success', 'Visa service deleted successfully.');
    }

    /**
     * Display the requirements for a specific visa.
     */
    public function requirements(VisaService $visa)
    {
        return view('visas.requirements', compact('visa'));
    }

    /**
     * Delete an extra image.
     */
    public function deleteImage(Request $request, $visaId, $imageId)
    {
        $image = ServiceImage::where('service_type', 'visa')
                            ->where('service_id', $visaId)
                            ->where('id', $imageId)
                            ->firstOrFail();

        Storage::disk('public')->delete($image->image_path);
        $image->delete();

        return response()->json(['success' => true]);
    }
}
