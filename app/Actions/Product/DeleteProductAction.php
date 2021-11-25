<?php

namespace App\Actions\Product;
use App\Actions\BaseAction;
use App\Models\Product;
use App\Services\HandleImageService;
use App\Transformers\ProductTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class DeleteProductAction extends BaseAction
{
    public function __invoke(Product $product)
    {
        return DB::transaction(function () use ($product) {
            $file = new HandleImageService();
            $file->handleDeleteImage($product);

            $product->delete();

            return $this->noContent();
        });
    }
}
