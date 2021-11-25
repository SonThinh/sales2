<?php

namespace App\Actions\Product;

use App\Actions\BaseAction;
use App\Models\Product;
use App\Models\Role;
use App\Transformers\ProductTransformer;
use Illuminate\Http\JsonResponse;

class ShowDetailProductAction extends BaseAction
{
    /**
     * @param Product $product
     * @return JsonResponse
     */
    public function __invoke(Product $product): JsonResponse
    {
        return $this->ok($product, ProductTransformer::class);
    }
}
