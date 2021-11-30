<?php

namespace App\Http\Requests\SinglePage;

use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class CreateSinglePageRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'content' => 'required|string|min:30'
        ];
    }
}
