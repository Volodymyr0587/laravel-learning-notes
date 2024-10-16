<?php

namespace App\Models;

use App\Enums\ResourceType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Note extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($note) {
            if (request()->hasFile('image')) {
                if ($note->getOriginal('image')) {
                    Storage::disk('public')->delete($note->getOriginal('image'));
                }
            }
        });

        static::deleting(function ($note) {
            if ($note->image) {
                Storage::disk('public')->delete($note->image);
            }
        });
    }

    protected $casts = [
        'resource_type' => ResourceType::class,
        'completed' => 'boolean',
    ];
}
