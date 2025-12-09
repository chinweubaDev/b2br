<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cruise;
use App\Models\ServiceImage;
use Illuminate\Support\Facades\Storage;

class CruiseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cruises = Cruise::where('is_active', true)->get();
        return view('cruises.index', compact('cruises'));
    }
 public function adminIndex()
    {
        $cruises = Cruise::where('is_active', true)->get();
        return view('admin.cruises.index', compact('cruises'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cruises.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'cruise_line' => 'required|string|max:255',
            'ship_name' => 'required|string|max:255',
            'route' => 'required|string|max:255',
            'departure_date' => 'required|date',
            'return_date' => 'required|date|after:departure_date',
            'duration_nights' => 'required|integer|min:1',
            'ports_of_call' => 'required|string',
            'standard_rate' => 'required|numeric|min:0',
            'b2b_rate' => 'required|numeric|min:0',
            'inclusions' => 'required|string',
            'exclusions' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'extra_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_captions.*' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('cruises', 'public');
        }

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('cruises', 'public');
        }

        $cruise = Cruise::create($validated);

        // Handle extra images
        if ($request->hasFile('extra_images')) {
            foreach ($request->file('extra_images') as $index => $image) {
                if ($image && $image->isValid()) {
                    $imagePath = $image->store('cruises/extra', 'public');
                    $caption = $request->input("image_captions.{$index}", '');
                    
                    ServiceImage::create([
                        'service_type' => 'cruise',
                        'service_id' => $cruise->id,
                        'image_path' => $imagePath,
                        'caption' => $caption,
                        'sort_order' => $index,
                        'is_active' => true,
                    ]);
                }
            }
        }

        return redirect()->route('admin.cruises.index')->with('success', 'Cruise created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cruise $cruise)
    {
        return view('cruises.show', compact('cruise'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cruise $cruise)
    {
        return view('admin.cruises.edit', compact('cruise'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cruise $cruise)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'cruise_line' => 'required|string|max:255',
            'ship_name' => 'required|string|max:255',
            'route' => 'required|string|max:255',
            'departure_date' => 'required|date',
            'return_date' => 'required|date|after:departure_date',
            'duration_nights' => 'required|integer|min:1',
            'ports_of_call' => 'required|string',
            'standard_rate' => 'required|numeric|min:0',
            'b2b_rate' => 'required|numeric|min:0',
            'inclusions' => 'required|string',
            'exclusions' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'extra_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_captions.*' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($cruise->image) {
                Storage::disk('public')->delete($cruise->image);
            }
            $validated['image'] = $request->file('image')->store('cruises', 'public');
        }

        if ($request->hasFile('featured_image')) {
            // Delete old featured image if exists
            if ($cruise->featured_image) {
                Storage::disk('public')->delete($cruise->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('cruises', 'public');
        }

        $cruise->update($validated);

        // Handle extra images
        if ($request->hasFile('extra_images')) {
            foreach ($request->file('extra_images') as $index => $image) {
                if ($image && $image->isValid()) {
                    $imagePath = $image->store('cruises/extra', 'public');
                    $caption = $request->input("image_captions.{$index}", '');
                    
                    ServiceImage::create([
                        'service_type' => 'cruise',
                        'service_id' => $cruise->id,
                        'image_path' => $imagePath,
                        'caption' => $caption,
                        'sort_order' => $index,
                        'is_active' => true,
                    ]);
                }
            }
        }

        return redirect()->route('admin.cruises.index')->with('success', 'Cruise updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cruise $cruise)
    {
        // Delete images
        if ($cruise->image) {
            Storage::disk('public')->delete($cruise->image);
        }
        if ($cruise->featured_image) {
            Storage::disk('public')->delete($cruise->featured_image);
        }

        // Delete extra images
        foreach ($cruise->images as $image) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
        }

        $cruise->delete();

        return redirect()->route('cruises.index')->with('success', 'Cruise deleted successfully.');
    }

    /**
     * Display the itinerary for a specific cruise.
     */
    public function itinerary(Cruise $cruise)
    {
        return view('cruises.itinerary', compact('cruise'));
    }

    /**
     * Delete an extra image.
     */
    public function deleteImage(Request $request, $cruiseId, $imageId)
    {
        $image = ServiceImage::where('service_type', 'cruise')
                            ->where('service_id', $cruiseId)
                            ->where('id', $imageId)
                            ->firstOrFail();

        Storage::disk('public')->delete($image->image_path);
        $image->delete();

        return response()->json(['success' => true]);
    }
}
