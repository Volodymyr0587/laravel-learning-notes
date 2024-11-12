<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = auth()->user()->categories()->paginate(5);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();
        auth()->user()->categories()->create($validated);
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        Gate::authorize('editCategory', $category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        Gate::authorize('editCategory', $category);

        $relatedNotes = $category->notes()->paginate(2);

        return view('categories.edit', compact('category', 'relatedNotes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCategoryRequest $request, Category $category)
    {
        Gate::authorize('editCategory', $category);

        $validated = $request->validated();
        $category->update($validated);
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Gate::authorize('editCategory', $category);
        // Check if the category has related notes
        if ($category->notes()->exists()) {
            // Optionally handle reassignment or deletion of the related notes
            return redirect()->back()->with('warning', 'This category has associated notes and cannot be deleted.');
        }

        $category->delete();

        return to_route('categories.index')->with('success', 'Category successfully deleted');
    }
}
