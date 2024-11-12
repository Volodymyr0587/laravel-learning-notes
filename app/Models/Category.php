<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function notes(): BelongsToMany
    {
        return $this->belongsToMany(Note::class);
    }

    public function scopeSortByName(Builder $query, $direction = 'asc')
    {
        return $query->orderBy('name', $direction);
    }

    public function scopeSortByDate(Builder $query, $direction = 'asc')
    {
        return $query->orderBy('updated_at', $direction);
    }
}
