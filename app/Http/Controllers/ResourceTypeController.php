<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\ResourceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreResourceTypeRequest;

class ResourceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = auth()->user()->resourceTypes();

        $sortByName = $request->query('sortByName'); // Either 'asc' or 'desc'
        $sortByDate = $request->query('sortByDate'); // Either 'asc' or 'desc'

        if ($sortByName) {
            $query->sortByName($sortByName);
        } elseif ($sortByDate) {
            $query->sortByDate($sortByDate);
        }

        $resourceTypes = $query->paginate(5)->withQueryString();

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
            $count = $resourceType->notes()->count();
            $message = "This resource type has $count associated " . Str::plural('note', $count) . " and cannot be deleted.";
            return redirect()->back()->with('warning', $message);
        }

        $resourceType->delete();

        return to_route('resource-types.index')->with('success', 'Resource type successfully deleted');
    }
}
