<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResourceType extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function notes(): HasMany
    {
        return $this->hasMany(Note::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
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
