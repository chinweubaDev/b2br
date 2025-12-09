<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\ServiceImage;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = Hotel::where('is_active', true)->get();
        return view('hotels.index', compact('hotels'));
    }
 public function AdminIndex()
    {
        $hotels = Hotel::where('is_active', true)->get();
        return view('admin.hotels.index', compact('hotels'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.hotels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'star_rating' => 'required|integer|min:1|max:7',
            'category' => 'required|string|max:255',
            'amenities' => 'required|array|min:1',
            'amenities.*' => 'string|max:255',
            'standard_rate' => 'required|numeric|min:0',
            'b2b_rate' => 'required|numeric|min:0',
            'currency' => 'required|string|max:3',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'extra_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_captions.*' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        // Convert amenities array to JSON
        $validated['amenities'] = json_encode($validated['amenities']);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('hotels', 'public');
        }

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('hotels', 'public');
        }

        $hotel = Hotel::create($validated);

        // Handle extra images
        if ($request->hasFile('extra_images')) {
            foreach ($request->file('extra_images') as $index => $image) {
                if ($image && $image->isValid()) {
                    $imagePath = $image->store('hotels/extra', 'public');
                    $caption = $request->input("image_captions.{$index}", '');
                    
                    ServiceImage::create([
                        'service_type' => 'hotel',
                        'service_id' => $hotel->id,
                        'image_path' => $imagePath,
                        'caption' => $caption,
                        'sort_order' => $index,
                        'is_active' => true,
                    ]);
                }
            }
        }

        return redirect()->route('admin.hotels.index')->with('success', 'Hotel created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hotel $hotel)
    {
        return view('hotels.show', compact('hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $hotel)
    {
        return view('admin.hotels.edit', compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hotel $hotel)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'star_rating' => 'required|integer|min:1|max:7',
            'category' => 'required|string|max:255',
            'amenities' => 'required|array|min:1',
            'amenities.*' => 'string|max:255',
            'standard_rate' => 'required|numeric|min:0',
            'b2b_rate' => 'required|numeric|min:0',
            'currency' => 'required|string|max:3',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'extra_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_captions.*' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        // Convert amenities array to JSON
        $validated['amenities'] = json_encode($validated['amenities']);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($hotel->image) {
                Storage::disk('public')->delete($hotel->image);
            }
            $validated['image'] = $request->file('image')->store('hotels', 'public');
        }

        if ($request->hasFile('featured_image')) {
            // Delete old featured image if exists
            if ($hotel->featured_image) {
                Storage::disk('public')->delete($hotel->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('hotels', 'public');
        }

        $hotel->update($validated);

        // Handle extra images
        if ($request->hasFile('extra_images')) {
            foreach ($request->file('extra_images') as $index => $image) {
                if ($image && $image->isValid()) {
                    $imagePath = $image->store('hotels/extra', 'public');
                    $caption = $request->input("image_captions.{$index}", '');
                    
                    ServiceImage::create([
                        'service_type' => 'hotel',
                        'service_id' => $hotel->id,
                        'image_path' => $imagePath,
                        'caption' => $caption,
                        'sort_order' => $index,
                        'is_active' => true,
                    ]);
                }
            }
        }

        return redirect()->route('admin.hotels.index')->with('success', 'Hotel updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel)
    {
        // Delete images
        if ($hotel->image) {
            Storage::disk('public')->delete($hotel->image);
        }
        if ($hotel->featured_image) {
            Storage::disk('public')->delete($hotel->featured_image);
        }

        // Delete extra images
        foreach ($hotel->images as $image) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
        }

        $hotel->delete();

        return redirect()->route('hotels.index')->with('success', 'Hotel deleted successfully.');
    }

    /**
     * Display the amenities for a specific hotel.
     */
    public function amenities(Hotel $hotel)
    {
        return view('hotels.amenities', compact('hotel'));
    }

    /**
     * Delete an extra image.
     */
    public function deleteImage(Request $request, $hotelId, $imageId)
    {
        $image = ServiceImage::where('service_type', 'hotel')
                            ->where('service_id', $hotelId)
                            ->where('id', $imageId)
                            ->firstOrFail();

        Storage::disk('public')->delete($image->image_path);
        $image->delete();

        return response()->json(['success' => true]);
    }
}
