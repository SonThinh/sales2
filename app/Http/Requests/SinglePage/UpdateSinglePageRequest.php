<?php

namespace App\Http\Requests\SinglePage;

use App\Http\Requests\BaseRequest;

class UpdateSinglePageRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'content' => 'sometimes|string',
        ];
    }
}
