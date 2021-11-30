<?php

namespace App\Actions\SinglePage;

use App\Actions\BaseAction;
use App\Models\SinglePage;
use App\Transformers\SinglePageTransformer;
use Illuminate\Http\JsonResponse;

class ShowDetailSinglePageAction extends BaseAction
{
    /**
     * @param SinglePage $singlePage
     * @return JsonResponse
     */
    public function __invoke(SinglePage $singlePage): JsonResponse
    {
        return $this->ok($singlePage, SinglePageTransformer::class);
    }
}
