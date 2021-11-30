<?php

namespace App\Actions\SinglePage;

use App\Actions\BaseAction;
use App\Filters\SinglePageFilter;
use App\Models\SinglePage;
use App\Sorts\SinglePageSort;
use App\Transformers\SinglePageTransformer;
use Illuminate\Http\JsonResponse;

class ShowListSinglePageAction extends BaseAction
{
    protected $singlePageFilter;

    protected $singlePageSort;

    public function __construct(SinglePageSort $singlePageSort, SinglePageFilter $singlePageFilter)
    {
        parent::__construct();
        $this->singlePageSort = $singlePageSort;
        $this->singlePageFilter = $singlePageFilter;
    }

    /**
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        $singlePage = SinglePage::query()
            ->filter($this->singlePageFilter)
            ->sortBy($this->singlePageSort)
            ->paginate($this->per_page);

        return $this->ok($singlePage, SinglePageTransformer::class);
    }
}
