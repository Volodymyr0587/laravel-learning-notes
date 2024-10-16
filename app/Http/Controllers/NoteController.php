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
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notes.create');
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

        $note = auth()->user()->notes()->create($validated);

        if ($request->has('categories')) {
            $note->categories()->attach($request->categories);
        }

        return to_route('dashboard')->with('success', 'Record successfully created.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        //
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
