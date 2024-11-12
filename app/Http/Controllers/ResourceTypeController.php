<?php

namespace App\Http\Controllers;

use App\Models\ResourceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreResourceTypeRequest;

class ResourceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resourceTypes = auth()->user()->resourceTypes()->paginate(5);
        return view('resource_types.index', compact('resourceTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('resource_types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreResourceTypeRequest $request)
    {
        $validated = $request->validate(['name' => 'required|string|min:2|max:255']);
        auth()->user()->resourceTypes()->create($validated);
        return redirect()->route('resource-types.index')->with('success', 'Resource type created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ResourceType $resourceType)
    {
        Gate::authorize('editResourceType', $resourceType);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ResourceType $resourceType)
    {
        Gate::authorize('editResourceType', $resourceType);

        $relatedNotes = $resourceType->notes()->paginate(2);

        return view('resource_types.edit', compact('resourceType', 'relatedNotes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreResourceTypeRequest $request, ResourceType $resourceType)
    {
        Gate::authorize('editResourceType', $resourceType);

        $validated = $request->validate(['name' => 'required|string|min:2|max:255']);
        $resourceType->update($validated);
        return redirect()->route('resource-types.index')->with('success', 'Resource type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ResourceType $resourceType)
    {
        Gate::authorize('editResourceType', $resourceType);
        // Check if the resource type has related notes
        if ($resourceType->notes()->exists()) {
            // Optionally handle reassignment or deletion of the related notes
            return redirect()->back()->with('warning', 'This resource type has associated notes and cannot be deleted.');
        }

        $resourceType->delete();

        return to_route('resource-types.index')->with('success', 'Resource type successfully deleted');
    }
}
