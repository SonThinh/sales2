<?php

namespace App\Http\Requests\Discount;

use App\Http\Requests\BaseRequest;

class UpdateDiscountRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules():array
    {
        return [
            'name'    => 'sometimes|string|unique:discounts,name,'.$this->discount->id,
            'percent' => 'sometimes|digits_between:0,100'
        ];
    }
}
