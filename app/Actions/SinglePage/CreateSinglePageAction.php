<?php

namespace App\Actions\SinglePage;

use App\Actions\BaseAction;
use App\Models\SinglePage;
use App\Transformers\SinglePageTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class CreateSinglePageAction extends BaseAction
{
    /**
     * @param array $data
     * @return JsonResponse
     */
    public function __invoke(array $data): JsonResponse
    {
        return DB::transaction(function () use ($data) {
            $singlePage = SinglePage::create($data);

            return $this->ok($singlePage, SinglePageTransformer::class);
        });
    }
}
