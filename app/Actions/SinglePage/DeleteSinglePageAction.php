<?php

namespace App\Actions\SinglePage;

use App\Actions\BaseAction;
use App\Models\SinglePage;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class DeleteSinglePageAction extends BaseAction
{
    /**
     * @param SinglePage $singlePage
     * @return JsonResponse
     */
    public function __invoke(SinglePage $singlePage): JsonResponse
    {
        return DB::transaction(function () use ($singlePage) {
            $singlePage->delete();

            return $this->noContent();
        });
    }
}
