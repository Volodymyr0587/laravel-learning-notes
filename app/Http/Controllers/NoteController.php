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
        // Start building the query
        $query = auth()->user()->notes()
            ->with([
                'categories:id,name',
                'resourceType:id,name'
            ]);
        // Apply filters for category, resource type, and status
        $query->filterByCategory($request->query('category_id'))
            ->filterByResourceType($request->query('resource_type_id'))
            ->filterByStatus($request->query('completed'));
        // Apply search filter for title and description
        $query->searchByTitleDescription($searchTerm);

        $notes = $query->select(['id', 'image', 'title', 'link_to_tutorial',  'resource_type_id', 'completed', 'updated_at'])
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

        return to_route('notes.index')->with('success', 'Record successfully created.');

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

        return to_route('notes.index')->with('success', 'Record successfully updated.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        Gate::authorize('editNote', $note);

        $note->delete();

        return to_route('notes.index')->with('success', 'Record successfully deleted');
    }

    public function trash()
    {
        $notes = Note::onlyTrashed()->paginate(10);
        return view('notes.trash', compact('notes'));
    }

    public function restore(Note $note)
    {
        Gate::authorize('editNote', $note);

        $note = Note::withTrashed()->findOrFail($note);
        $note->restore();

        return redirect()->route('notes.trash')->with('success', 'Note restored');
    }

    protected function handleImageUpload($request)
    {
        if ($request->hasFile('image')) {
            return $request->file('image')->store('notes', 'public');
        }

        return null;
    }

    protected function setDefaultDatabaseName($databaseName)
    {
        return empty($databaseName) ? 'sqlite' : $databaseName;
    }

}
