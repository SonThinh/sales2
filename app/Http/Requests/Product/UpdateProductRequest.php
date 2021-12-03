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
            'description'	    => 'sometimes|string|digits_between:20,300',
            'price'	            => 'sometimes|int|digits_between:1000,10000000',
            'discount'	        => 'sometimes|int',
            'image'	            => 'nullable|mimes:jpeg,jpg,png,gif',
            'is_free_shipping'  => 'sometimes|boolean',
            'is_hot'	        => 'sometimes|boolean',
            'category_id'       => 'sometimes|int|exists:categories,id'
        ];
    }
}
