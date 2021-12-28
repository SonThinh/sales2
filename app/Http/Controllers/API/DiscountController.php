<?php

namespace App\Http\Controllers\API;

use App\Actions\Discount\DeleteDiscountAction;
use App\Actions\Discount\CreateDiscountAction;
use App\Actions\Discount\ShowDetailDiscountAction;
use App\Actions\Discount\ShowListDiscountAction;
use App\Actions\Discount\UpdateDiscountAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Discount\CreateDiscountRequest;
use App\Http\Requests\Discount\UpdateDiscountRequest;
use App\Models\Discount;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param ShowListDiscountAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(ShowListDiscountAction $action)
    {
        return ($action)();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateDiscountRequest $request, CreateDiscountAction $action)
    {
        return ($action)($request->validated());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDiscountRequest $request
     * @param UpdateDiscountAction $action
     * @param Discount $discount
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateDiscountRequest $request, UpdateDiscountAction $action, Discount $discount)
    {
        return ($action)($request->validated(), $discount);
    }

    /**
     *  Display the specified resource.
     *
     * @param Discount $discount
     * @param ShowDetailDiscountAction $action
     * @return \Illuminate\Http\JsonResponse
     */

    public function show(Discount $discount, ShowDetailDiscountAction $action)
    {
        return ($action)($discount);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Discount $discount
     * @param DeleteDiscountAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Discount $discount, DeleteDiscountAction $action)
    {
        return ($action)($discount);
    }
}
