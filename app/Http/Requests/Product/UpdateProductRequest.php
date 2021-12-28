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
            'product_name'	    => 'sometimes|string|unique:products,product_name,'.$this->product->id,
            'description'	    => 'sometimes|string|min:20',
            'price'	            => 'sometimes|int|digits_between:4,8',
            'image'	            => 'nullable|mimes:jpeg,jpg,png,gif',
            'is_free_shipping'  => 'sometimes|boolean',
            'is_hot'	        => 'sometimes|boolean',
            'discount'          => 'sometimes|int|exists:discounts,id',
            'category_id'       => 'sometimes|int|exists:categories,id',
        ];
    }
}
