<?php

namespace App\Http\Requests\Product;

use App\Http\Requests\BaseRequest;

class UpdateProductRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'product_name'	    => 'sometimes|string|unique:products,product_name'.$this->product->id,
            'description'	    => 'sometimes|string|min:20',
            'price'	            => 'sometimes|int|min:1000',
            'discount'	        => 'sometimes|int',
            'image'	            => 'sometimes|mimes:jpeg,jpg,png,gif',
            'is_free_shipping'  => 'sometimes|int|min:0|max:1',
            'is_hot'	        => 'sometimes|int|min:0|max:1',
            'category_id'       => 'sometimes|int|exists:categories,id'
        ];
    }
}
