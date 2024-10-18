<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoteRequest;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categoryId = $request->query('category_id');
        $resourceTypeId = $request->query('resource_type_id');
        $status = $request->query('completed');

        $notes = auth()->user()->notes()
            ->with(['categories', 'resourceType'])
            ->filterByCategory($categoryId)
            ->filterByResourceType($resourceTypeId)
            ->filterByStatus($status)
            ->paginate(2)->withQueryString();

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
        return view('notes.show', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        $resourceTypes = auth()->user()->resourceTypes()->get();
        $categories = auth()->user()->categories()->get();

        return view('notes.edit', compact('note', 'resourceTypes', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreNoteRequest $request, Note $note)
    {
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
        $note->delete();

        return to_route('notes.index')->with('success', 'Record successfully deleted');
    }

    public function trash()
    {
        $notes = Note::onlyTrashed()->paginate(10);
        return view('notes.trash', compact('notes'));
    }

    public function restore($id)
    {
        $note = Note::withTrashed()->findOrFail($id);
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
