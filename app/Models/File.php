<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class File extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'file_name',
        'disk',
        'file_path',
        'file_size',
        'fileable_id',
        'fileable_type'
    ];

    // ======================================================================
    // Relationships
    // ======================================================================

    public function fileable(): MorphTo
    {
        return $this->morphTo();
    }
}
