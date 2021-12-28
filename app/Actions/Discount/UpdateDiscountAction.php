<?php

namespace App\Actions\Discount;

use App\Actions\BaseAction;
use App\Models\Discount;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Transformers\DiscountTransformer;

class UpdateDiscountAction extends BaseAction
{
    /**
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(array $data, Discount $discount): JsonResponse
    {
        return DB::transaction(function () use ($data, $discount) {
            $discount->update($data);

            return $this->ok($discount, DiscountTransformer::class);
        });
    }
}
