<?php

namespace App\Models;

use App\Builders\ProductBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use App\Traits\OverridesBuilder;

class Product extends Model
{
    use OverridesBuilder;

    public function provideCustomBuilder(): string
    {
        return ProductBuilder::class;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'product_name',
        'description',
        'price',
        'discount',
        'is_free_shipping',
        'is_hot',
        'category_id'
    ];

    // ======================================================================
    // Relationships
    // ======================================================================

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function discounts(): BelongsToMany
    {
        return $this->belongsToMany(Discount::class,'product_discount');
    }
}
