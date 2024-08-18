<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['created_by', 'name', 'color'];

    public function Listings(): BelongsToMany
    {
        return $this->belongsToMany(Listing::class);
    }

    public function scopeListing(Builder $query): void
    {
        if (auth()->user()->hasRole('user')){
            $query->where('created_by', auth()->id());
        }
    }
}
