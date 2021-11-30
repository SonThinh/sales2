<?php

namespace App\Http\Controllers\API;

use App\Actions\SinglePage\DeleteSinglePageAction;
use App\Actions\SinglePage\ShowListSinglePageAction;
use App\Actions\SinglePage\UpdateSinglePageAction;
use App\Actions\SinglePage\ShowDetailSinglePageAction;
use App\Actions\SinglePage\CreateSinglePageAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\SinglePage\CreateSinglePageRequest;
use App\Http\Requests\SinglePage\UpdateSinglePageRequest;
use App\Models\SinglePage;
use Illuminate\Http\JsonResponse;
use App\Models\Role;

class SinglePageController extends Controller
{
    public function __construct()
    {
//        $this->authorizeResource(Role::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @param ShowListSinglePageAction $action
     * @return JsonResponse
     */

    public function index(ShowListSinglePageAction $action): JsonResponse
    {
        return ($action)();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateSinglePageAction $action
     * @param CreateSinglePageRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateSinglePageRequest $request, CreateSinglePageAction $action): JsonResponse
    {
        return ($action)($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param SinglePage $singlePage
     * @param ShowDetailSinglePageAction $action
     * @return mixed
     */
    public function show(SinglePage $singlePage, ShowDetailSinglePageAction $action)
    {
        return ($action)($singlePage);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSinglePageRequest $request
     * @param UpdateSinglePageAction $action
     * @param SinglePage $singlePage
     * @return \Illuminate\Http\JsonResponse
     */

    public function update(UpdateSinglePageRequest $request, UpdateSinglePageAction $action,SinglePage $singlePage):JsonResponse
    {
        return ($action)($singlePage, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DeleteSinglePageAction $action
     * @param SinglePage $singlePage
     * @return mixed
     */
    public function destroy(DeleteSinglePageAction $action, SinglePage $singlePage)
    {
        return ($action)($singlePage);
    }
}
