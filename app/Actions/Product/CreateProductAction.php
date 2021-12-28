<?php

namespace App\Actions\Product;

use App\Actions\BaseAction;
use App\Models\Product;
use App\Services\HandleImageService;
use App\Transformers\ProductTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class CreateProductAction extends BaseAction
{
    /**
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(array $data): JsonResponse
    {
        return DB::transaction(function () use ($data) {
            $product = Product::create(Arr::except($data, 'discount'));
            $product->discounts()->sync($data['discount']);

            $file = new HandleImageService();
            $file->handleUploadImage($product, $data);

            return $this->created($product, ProductTransformer::class);
        });
    }
}
