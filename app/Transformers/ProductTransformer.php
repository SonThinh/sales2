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
        'files' => FileTransformer::class
    ];

    /**
     * List of autoloaded default relations.
     *
     * @var array
     */
    protected $load = [
        'files' => FileTransformer::class
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
            'discount'          => (string) $product->discount,
            'is_hot'            => (int) $product->is_hot,
            'is_free_shipping'  => (int) $product->is_free_shipping,
            'category_id'       => (int) $product->category_id,
        ];
    }
}
