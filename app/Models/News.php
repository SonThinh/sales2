<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class News extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'content',
        'user_id'
    ];

    // ======================================================================
    // Relationships
    // ======================================================================

    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'fileable');
    }
}
