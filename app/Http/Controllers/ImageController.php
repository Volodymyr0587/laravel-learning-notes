<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function destroy(Image $image)
    {
        // Check authorization (if needed)
        Gate::authorize('editNote', $image->note);

        // Ensure you have the correct path for storage
        $imagePath = $image->path;

        // Delete the image file from storage
        if (Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);;
        } else {
            // Optionally, log or handle cases where the file doesn't exist
            \Log::warning("File not found: {$imagePath}");
        }

        // Delete the image record from the database
        $image->delete();

        return back()->with('success', 'Image deleted successfully.');
    }
}
