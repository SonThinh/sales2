<?php

namespace App\Actions\Discount;

use App\Actions\BaseAction;
use App\Models\Discount;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Transformers\DiscountTransformer;

class DeleteDiscountAction extends BaseAction
{
    /**
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Discount $discount): JsonResponse
    {
        return DB::transaction(function () use ($discount) {
            $discount->delete();

            return $this->noContent();
        });
    }
}
