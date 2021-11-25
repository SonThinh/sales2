<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['category_name'];

    // ======================================================================
    // Relationships
    // ======================================================================

    public function products():HasMany
    {
        return $this->hasMany(Product::class,'category_id','id');
    }
}
