<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TourPackage;
use App\Models\ServiceImage;
use Illuminate\Support\Facades\Storage;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tours = TourPackage::where('is_active', true)->get();
        return view('tours.index', compact('tours'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tours.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'travel_start_date' => 'required|date',
            'travel_end_date' => 'required|date|after:travel_start_date',
            'duration_days' => 'required|integer|min:1',
            'standard_rate' => 'required|numeric|min:0',
            'b2b_rate' => 'required|numeric|min:0',
            'inclusions' => 'required|string',
            'exclusions' => 'nullable|string',
            'itinerary' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'extra_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_captions.*' => 'nullable|string|max:255',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('tours', 'public');
        }

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('tours', 'public');
        }

        $tour = TourPackage::create($validated);

        // Handle extra images
        if ($request->hasFile('extra_images')) {
            foreach ($request->file('extra_images') as $index => $image) {
                if ($image && $image->isValid()) {
                    $imagePath = $image->store('tours/extra', 'public');
                    $caption = $request->input("image_captions.{$index}", '');
                    
                    ServiceImage::create([
                        'service_type' => 'tour',
                        'service_id' => $tour->id,
                        'image_path' => $imagePath,
                        'caption' => $caption,
                        'sort_order' => $index,
                        'is_active' => true,
                    ]);
                }
            }
        }

        return redirect()->route('tours.index')->with('success', 'Tour package created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TourPackage $tour)
    {
        return view('tours.show', compact('tour'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TourPackage $tour)
    {
        return view('tours.edit', compact('tour'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TourPackage $tour)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'travel_start_date' => 'required|date',
            'travel_end_date' => 'required|date|after:travel_start_date',
            'duration_days' => 'required|integer|min:1',
            'standard_rate' => 'required|numeric|min:0',
            'b2b_rate' => 'required|numeric|min:0',
            'inclusions' => 'required|string',
            'exclusions' => 'nullable|string',
            'itinerary' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'extra_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_captions.*' => 'nullable|string|max:255',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($tour->image) {
                Storage::disk('public')->delete($tour->image);
            }
            $validated['image'] = $request->file('image')->store('tours', 'public');
        }

        if ($request->hasFile('featured_image')) {
            // Delete old featured image if exists
            if ($tour->featured_image) {
                Storage::disk('public')->delete($tour->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('tours', 'public');
        }

        $tour->update($validated);

        // Handle extra images
        if ($request->hasFile('extra_images')) {
            foreach ($request->file('extra_images') as $index => $image) {
                if ($image && $image->isValid()) {
                    $imagePath = $image->store('tours/extra', 'public');
                    $caption = $request->input("image_captions.{$index}", '');
                    
                    ServiceImage::create([
                        'service_type' => 'tour',
                        'service_id' => $tour->id,
                        'image_path' => $imagePath,
                        'caption' => $caption,
                        'sort_order' => $index,
                        'is_active' => true,
                    ]);
                }
            }
        }

        return redirect()->route('tours.index')->with('success', 'Tour package updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TourPackage $tour)
    {
        // Delete images
        if ($tour->image) {
            Storage::disk('public')->delete($tour->image);
        }
        if ($tour->featured_image) {
            Storage::disk('public')->delete($tour->featured_image);
        }

        // Delete extra images
        foreach ($tour->images as $image) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
        }

        $tour->delete();

        return redirect()->route('tours.index')->with('success', 'Tour package deleted successfully.');
    }

    /**
     * Display the itinerary for a specific tour.
     */
    public function itinerary(TourPackage $tour)
    {
        return view('tours.itinerary', compact('tour'));
    }

    /**
     * Delete an extra image.
     */
    public function deleteImage(Request $request, $tourId, $imageId)
    {
        $image = ServiceImage::where('service_type', 'tour')
                            ->where('service_id', $tourId)
                            ->where('id', $imageId)
                            ->firstOrFail();

        Storage::disk('public')->delete($image->image_path);
        $image->delete();

        return response()->json(['success' => true]);
    }
}
