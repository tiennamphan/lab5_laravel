<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Movie extends Model
{
    use HasFactory;

    // Các trường có thể điền được (fillable)
    protected $fillable = [
        'title',
        'poster',
        'intro',
        'release_date',
        'genre_id'
    ];

    public function gene(): BelongsTo
    {
        return $this->belongsTo(Gene::class, 'genre_id');
    }
}
