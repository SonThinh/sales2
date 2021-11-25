<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class SinglePage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $table = 'single_page';

    protected $fillable = [
        'content'
    ];

    // ======================================================================
    // Relationships
    // ======================================================================

    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'fileable');
    }
}
