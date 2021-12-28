<?php

namespace App\Actions\Product;

use App\Actions\BaseAction;
use App\Models\Product;
use App\Services\HandleImageService;
use App\Transformers\ProductTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class UpdateProductAction extends BaseAction
{
    /**
     * @param Product $product
     * @param array $data
     * @return mixed
     */

    public function __invoke(Product $product, array $data): JsonResponse
    {
        return DB::transaction(function () use ($product, $data) {
            $product->update(Arr::except($data, 'discount'));
            $product->discounts()->sync($data['discount']);

            $file = new HandleImageService();
            $file->handleUpdateImage($product, $data);

            return $this->ok($product, ProductTransformer::class);
        });
    }

}
