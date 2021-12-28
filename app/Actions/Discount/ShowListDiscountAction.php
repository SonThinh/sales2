<?php

namespace App\Actions\Discount;

use App\Actions\BaseAction;
use App\Filters\DiscountFilter;
use App\Models\Discount;
use App\Sorts\DiscountSort;
use App\Transformers\DiscountTransformer;
use Illuminate\Http\JsonResponse;

class ShowListDiscountAction extends BaseAction
{
    protected $discountFilter;

    protected $discountSort;

    public function __construct(DiscountFilter $discountFilter, DiscountSort $discountSort)
    {
        parent::__construct();
        $this->discountFilter = $discountFilter;
        $this->discountSort = $discountSort;
    }

    /**
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        $discounts = Discount::query()
            ->filter($this->discountFilter)
            ->sortBy($this->discountSort)
            ->paginate($this->per_page);

        return $this->ok($discounts, DiscountTransformer::class);
    }
}
