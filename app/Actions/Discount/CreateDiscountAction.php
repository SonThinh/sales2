<?php

namespace App\Actions\Discount;

use App\Actions\BaseAction;
use App\Models\Discount;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Transformers\DiscountTransformer;

class CreateDiscountAction extends BaseAction
{
    /**
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(array $data): JsonResponse
    {
        return DB::transaction(function () use ($data) {
            $discount = Discount::create($data);

            return $this->created($discount, DiscountTransformer::class);
        });
    }
}
