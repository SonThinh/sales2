<?php

namespace App\Models;

use App\Builders\Ward\WardBuilder;
use App\Traits\OverridesBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory, OverridesBuilder;

    public function provideCustomBuilder(): string
    {
        return WardBuilder::class;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'code',
        'division_type',
        'district_id',
        'parent_code',
    ];

    // ======================================================================
    // Relationships
    // ======================================================================

}
