<?php

namespace App\Models;

use App\Builders\District\DistrictBuilder;
use App\Traits\OverridesBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory, OverridesBuilder;

    public function provideCustomBuilder(): string
    {
        return DistrictBuilder::class;
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
        'city_id',
        'parent_code',
    ];

    // ======================================================================
    // Relationships
    // ======================================================================

}
