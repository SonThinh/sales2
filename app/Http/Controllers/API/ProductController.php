<?php

namespace App\Http\Controllers\API;

use App\Actions\Product\CreateProductAction;
use App\Actions\Product\DeleteProductAction;
use App\Actions\Product\ShowDetailProductAction;
use App\Actions\Product\ShowListProductAction;
use App\Actions\Product\UpdateProductAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Banner;
use App\Models\News;
use App\Models\Product;
use App\Models\Role;
use App\Models\SinglePage;
use App\Models\User;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function __construct()
    {
//        $this->authorizeResource(Role::class);
    }

    /**
     * Display a listing of the resource.
     * @param ShowListProductAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(ShowListProductAction $action)
    {
        return ($action)();
    }

    /**
     * @param CreateProductRequest $request
     * @param CreateProductAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateProductRequest $request, CreateProductAction $action)
    {
        return ($action)($request->validated());
    }

    /**
     * Display the specified resource.
     * @param Product $product
     * @param ShowDetailProductAction $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Product $product, ShowDetailProductAction $action)
    {
        return ($action)($product);
    }


    /**
     * Update the specified resource in storage.
     * @param UpdateProductRequest $request
     * @param Product $product
     * @param UpdateProductAction $action
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function update(UpdateProductRequest $request, Product $product, UpdateProductAction $action)
    {
        return ($action)($product, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     * @param Product $product
     * @param DeleteProductAction $action
     * @return mixed
     */
    public function destroy(Product $product, DeleteProductAction $action)
    {
        return ($action)($product);
    }
}
