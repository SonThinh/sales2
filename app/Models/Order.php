<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'date_buy',
        'user_id',
        'total_price',
        'status',
    ];

    // ======================================================================
    // Relationships
    // ======================================================================
    public function user(): BelongsTo
    {
        return $this->belongsTo(Order::class,'user_id','id');
    }
}
