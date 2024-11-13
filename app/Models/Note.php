<?php

namespace App\Models;


use Illuminate\Support\Str;
use App\Models\ResourceType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Note extends Model
{
    use SoftDeletes, HasFactory;

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function resourceType(): BelongsTo
    {
        return $this->belongsTo(ResourceType::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function scopeFilterByCategory(Builder $query, $categoryId): Builder
    {
        return $categoryId ? $query->whereHas('categories', function ($q) use ($categoryId) {
            $q->where('categories.id', $categoryId);
        }) : $query;
    }

    public function scopeFilterByResourceType(Builder $query, $resourceTypeId): Builder
    {
        return $resourceTypeId ? $query->where('resource_type_id', $resourceTypeId) : $query;
    }

    public function scopeFilterByStatus(Builder $query, $status): Builder
    {
        return $status !== null ? $query->where('completed', $status) : $query;
    }

    public function scopeSearchByTitleDescription($query, $searchTerm)
    {
        if ($searchTerm) {
            return $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', '%' . $searchTerm . '%')
                ->orWhere('description', 'like', '%' . $searchTerm . '%');
            });
        }

        return $query;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Generate a unique slug for the note.
     *
     * @return void
     */
    protected function generateSlug()
    {
        $slug = Str::slug($this->title);
        $count = static::where('slug', 'LIKE', "{$slug}%")->count();
        $this->slug = $count ? "{$slug}-{$count}" : $slug;
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($note) {
            $note->generateSlug();

            if (request()->hasFile('image')) {
                if ($note->getOriginal('image')) {
                    Storage::disk('public')->delete($note->getOriginal('image'));
                }
            }
        });

        static::forceDeleting(function ($note) {
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
