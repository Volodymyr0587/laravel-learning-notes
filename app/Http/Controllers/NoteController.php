<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreNoteRequest;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        // Get the search query from the request
        $searchTerm = $request->query('search');

        $query = auth()->user()->notes()
            ->with([
                'user',
                'categories:id,name',
                'resourceType:id,name'
            ])
            ->filterByCategory($request->query('category_id'))
            ->filterByResourceType($request->query('resource_type_id'))
            ->filterByStatus($request->query('completed'))
            ->searchByTitleDescription($searchTerm);

        $notes = $query
            ->select(['id', 'image', 'title', 'slug', 'link_to_tutorial', 'resource_type_id', 'completed', 'updated_at'])
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $resourceTypes = auth()->user()->resourceTypes()->get();
        $categories = auth()->user()->categories()->get();

        return view('notes.create', compact('resourceTypes', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNoteRequest $request)
    {
        $validated = $request->validated();

        $validated['database_name'] = $this->setDefaultDatabaseName($validated['database_name']);
        $validated['image'] = $this->handleImageUpload($request);
        // Перевірка, чи чекбокс відмічений
        $validated['completed'] = $request->has('completed');

        $validated['resource_type_id'] = $request->resource_type_id;

        $note = auth()->user()->notes()->create($validated);

        if ($request->has('categories')) {
            $note->categories()->attach($request->categories);
        }

        $this->handleMultipleImagesUpload($request, $note);

        return to_route('notes.index')->with('success', "Note $note->title successfully created");

    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        Gate::authorize('editNote', $note);

        return view('notes.show', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        Gate::authorize('editNote', $note);

        $resourceTypes = auth()->user()->resourceTypes()->get();
        $categories = auth()->user()->categories()->get();

        return view('notes.edit', compact('note', 'resourceTypes', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreNoteRequest $request, Note $note)
    {
        Gate::authorize('editNote', $note);

        $validated = $request->validated();

        // Оновлюємо значення 'database_name', якщо порожнє, встановлюємо 'sqlite'
        $validated['database_name'] = $this->setDefaultDatabaseName($validated['database_name']);

        // Обробка зображення
        if ($request->hasFile('image')) {
            $validated['image'] = $this->handleImageUpload($request);
        }

        // Перевірка, чи чекбокс відмічений
        $validated['completed'] = $request->has('completed');

        $validated['resource_type_id'] = $request->resource_type_id;

        // Оновлюємо запис
        $note->update($validated);

        // Оновлюємо категорії, якщо вони були передані
        if ($request->has('categories')) {
            $note->categories()->sync($request->categories);
        }

        // Handle multiple images upload
        $this->handleMultipleImagesUpload($request, $note);

        return to_route('notes.index')->with('success', "Note $note->title successfully updated");
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        Gate::authorize('editNote', $note);

        $note->delete();

        return to_route('notes.index')->with('success', "Note $note->title successfully deleted");
    }

    public function trash()
    {
        $notes = auth()->user()->notes()->onlyTrashed()->paginate(5);
        return view('notes.trash', compact('notes'));
    }

    public function restore(Note $note)
    {
        Gate::authorize('editNote', $note);

        $note->restore();

        return redirect()->route('notes.trash')->with('success', "Note $note->title successfully restored");
    }

    public function restoreAll()
    {
        auth()->user()->notes()->onlyTrashed()->restore();

        return redirect()->route('notes.trash')->with('success', 'All notes successfully restored');
    }

    public function forceDelete(Note $note)
    {
        Gate::authorize('editNote', $note);

        $title = $note->title;

        $note->forceDelete();

        return redirect()->route('notes.trash')->with('success', "Note $title has been permanently deleted");
    }

    public function forceDeleteAll(Note $note)
    {
        // Retrieve all auth user trashed notes
        $trashedNotes = auth()->user()->notes()->onlyTrashed()->get();

        // Force delete each trashed note
        foreach ($trashedNotes as $note) {
            $note->forceDelete();
        }

        return redirect()->route('notes.trash')->with('success', 'All notes are permanently deleted');
    }



    protected function handleImageUpload($request)
    {
        if ($request->hasFile('image')) {
            return $request->file('image')->store('notes', 'public');
        }

        return null;
    }

    protected function handleMultipleImagesUpload($request, Note $note)
    {
        if ($request->hasFile('images')) {
            // Validate images
            $request->validate([
                'images.*' => 'image|mimes:jpeg,png,jpg|max:2048'
            ]);

            // Store and save new images
            foreach ($request->file('images') as $image) {
                $path = $image->store('note_images', 'public');
                $note->images()->create(['path' => $path]);
            }
        }
        return null;
    }

    protected function setDefaultDatabaseName($databaseName)
    {
        return empty($databaseName) ? 'sqlite' : $databaseName;
    }

}
