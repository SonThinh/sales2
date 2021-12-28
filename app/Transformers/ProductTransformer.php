<?php

namespace App\Transformers;

use App\Models\Product;
use Flugg\Responder\Transformers\Transformer;

class ProductTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [
        'files'     => FileTransformer::class,
        'discounts' => DiscountTransformer::class
    ];

    /**
     * List of autoloaded default relations.
     *
     * @var array
     */
    protected $load = [
        'files'     => FileTransformer::class,
        'discounts'  => DiscountTransformer::class
    ];

    /**
     * Transform the model.
     *
     * @param  \App\Models\Product $product
     * @return array
     */
    public function transform(Product $product)
    {
        return [
            'id'                => (int) $product->id,
            'name'              => (string) $product->product_name,
            'description'       => (string) $product->description,
            'price'             => (string) $product->price,
            'is_hot'            => (boolean) $product->is_hot,
            'is_free_shipping'  => (boolean) $product->is_free_shipping,
            'category_id'       => (boolean) $product->category_id,
        ];
    }
}
