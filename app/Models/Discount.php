<?php

namespace App\Models;

use App\Builders\DiscountBuilder;
use App\Traits\OverridesBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Discount extends Model
{
    use OverridesBuilder;

    public function provideCustomBuilder(): string
    {
        return DiscountBuilder::class;
    }

    protected $fillable = [
        'name',
        'percent'
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class,'product_discount');
    }
}
