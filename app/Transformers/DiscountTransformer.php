<?php

namespace App\Transformers;

use App\Models\Discount;
use Flugg\Responder\Transformers\Transformer;

class DiscountTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [];

    /**
     * List of autoloaded default relations.
     *
     * @var array
     */
    protected $load = [];

    /**
     * Transform the model.
     *
     * @param Discount $discount
     * @return int[]
     */
    public function transform(Discount $discount)
    {
        return [
            'id' => (int) $discount->id,
            'name' => (string) $discount->name,
            'percent' => (string) $discount->percent,
        ];
    }
}
