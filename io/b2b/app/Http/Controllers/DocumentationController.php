<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DocumentationService;

class DocumentationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = DocumentationService::where('is_active', true)->get();
        return view('documentation.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('documentation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_name' => 'required|string|max:255',
            'description' => 'required|string',
            'standard_rate' => 'required|numeric|min:0',
            'b2b_rate' => 'required|numeric|min:0',
            'requirements' => 'nullable|string',
            'processing_time' => 'nullable|string',
            'category' => 'required|string|max:255',
            'is_active' => 'boolean',
        ]);

        DocumentationService::create($validated);

        return redirect()->route('documentation.index')->with('success', 'Documentation service created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DocumentationService $documentation)
    {
        return view('documentation.show', compact('documentation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DocumentationService $documentation)
    {
        return view('documentation.edit', compact('documentation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DocumentationService $documentation)
    {
        $validated = $request->validate([
            'service_name' => 'required|string|max:255',
            'description' => 'required|string',
            'standard_rate' => 'required|numeric|min:0',
            'b2b_rate' => 'required|numeric|min:0',
            'requirements' => 'nullable|string',
            'processing_time' => 'nullable|string',
            'category' => 'required|string|max:255',
            'is_active' => 'boolean',
        ]);

        $documentation->update($validated);

        return redirect()->route('documentation.index')->with('success', 'Documentation service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DocumentationService $documentation)
    {
        $documentation->delete();

        return redirect()->route('documentation.index')->with('success', 'Documentation service deleted successfully.');
    }

    /**
     * Display the requirements for a specific documentation service.
     */
    public function requirements(DocumentationService $service)
    {
        return view('documentation.requirements', compact('service'));
    }
}
