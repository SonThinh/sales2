<?php

namespace App\Actions\Product;

use App\Actions\BaseAction;
use App\Filters\ProductFilter;
use App\Models\Product;
use App\Sorts\ProductSort;
use App\Transformers\ProductTransformer;
use Illuminate\Http\JsonResponse;

class ShowListProductAction extends BaseAction
{
    protected $productFilter;

    protected $productSort;

    public function __construct(ProductFilter $productFilter, ProductSort $productSort)
    {
        parent::__construct();
        $this->productFilter = $productFilter;
        $this->productSort = $productSort;
    }

    /**
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        $products = Product::query()
            ->filter($this->productFilter)
            ->sortBy($this->productSort)
            ->paginate($this->per_page);

        return $this->ok($products, ProductTransformer::class);
    }
}
