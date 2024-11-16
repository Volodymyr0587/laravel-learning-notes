<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;

class NoteExportController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Note $note)
    {

        Gate::authorize('editNote', $note);
        // Dynamic data
        $data = [
            'title' => $note->title,
            'link_to_tutorial' => $note->link_to_tutorial,
            'resource_name' => $note->resource_name,
            'resource_type' => $note->resourceType->name,
            'link_to_resource' => $note->link_to_resource,
            'project_folder' => $note->project_folder,
            'database_name' => $note->database_name,
            'link_to_github_repo' => $note->link_to_github_repo,
            'link_to_source_code' => $note->link_to_source_code,
            'link_to_source_materials' => $note->link_to_source_materials,
        ];

        // File content with placeholders replaced
        $content = <<<TEXT
[{$data['title']}]({$data['link_to_tutorial']})

[{$data['resource_type']} - {$data['resource_name']}]({$data['link_to_resource']})

PROJECT FOLDER: {$data['project_folder']}

DATABASE: {$data['database_name']}

GITHUB: {$data['link_to_github_repo']}

SOURCE CODE: {$data['link_to_source_code']}
TEXT;

        //% File name
        $fileName = Str::slug($note->title, '_');

        //% Save file to the 'public' disk
        // Storage::disk('public')->put($fileName, $content);
        //% Return file as a download
        // return response()->download(storage_path("app/public/{$fileName}"));

        //% Return a response with the text file for download
        return response($content)
            ->header('Content-Type', 'text/plain')
            ->header('Content-Disposition', "attachment; filename={$fileName}");
    }
}
