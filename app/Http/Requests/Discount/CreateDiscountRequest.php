<?php

namespace App\Http\Requests\Discount;

use App\Http\Requests\BaseRequest;

class CreateDiscountRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'    => 'required|string|unique:discounts,name',
            'percent' => 'required|digits_between:0,100'
        ];
    }
}
