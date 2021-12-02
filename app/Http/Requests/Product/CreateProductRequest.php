<?php

namespace App\Http\Requests\Product;

use Illuminate\Validation\Rule;
use App\Http\Requests\BaseRequest;

class CreateProductRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'product_name'	    => 'required|string|unique:products,product_name',
            'description'	    => 'required|string|digits_between:20,300',
            'price'	            => 'required|int|digits_between:1000,10000000',
            'discount'	        => 'required|int',
            'image'             => 'required|mimes:jpeg,jpg,png,gif',
            'is_free_shipping'  => 'required|int|boolean',
            'is_hot'	        => 'required|int|boolean',
            'category_id'       => 'required|int|exists:categories,id'
        ];
    }
}
