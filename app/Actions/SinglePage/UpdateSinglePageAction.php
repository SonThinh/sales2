<?php

namespace App\Actions\SinglePage;

use App\Actions\BaseAction;
use App\Models\SinglePage;
use App\Transformers\SinglePageTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class UpdateSinglePageAction extends BaseAction
{
    /**
     * @param SinglePage $singlePage
     * @param array $data
     * @return JsonResponse
     */
    public function __invoke(SinglePage $singlePage,array $data): JsonResponse
    {
        return DB::transaction(function () use ($singlePage, $data) {
            $singlePage->update($data);

            return $this->ok($singlePage, SinglePageTransformer::class);
        });
    }
}
