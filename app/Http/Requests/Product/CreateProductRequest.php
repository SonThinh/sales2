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
            'description'	    => 'required|string|min:20',
            'price'	            => 'required|int|min:1000',
            'discount'	        => 'required|int',
            'image'             => 'required|mimes:jpeg,jpg,png,gif',
            'is_free_shipping'  => 'required|int|min:0|max:1',
            'is_hot'	        => 'required|int|min:0|max:1',
            'category_id'       => 'required|int|exists:categories,id'
        ];
    }
}
