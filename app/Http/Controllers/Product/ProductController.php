<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Traits\HasApiResponses;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    use HasApiResponses;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->resourceSuccessResponse(
            trans('message.success.get', ['resource' => 'Product']),
            new ProductCollection(Product::paginate())
        );
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Product\ProductRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create([
            'uuid' => Str::orderedUuid(),
            'category_uuid' => $request->category_uuid,
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description,
            'metadata' => $request->metadata,
        ]);
        return $this->resourceSuccessResponse(
            trans('message.success.new', ['resource' => 'Category']),
            new ProductResource($product)
        );
    }

     /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Product $product)
    {
        return $this->resourceSuccessResponse(
            trans('message.success.get', ['resource' => 'Product']),
            new ProductResource($product)
        );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Product\ProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product = $product->update([
            'category_uuid' => $request->category_uuid,
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description,
            'metadata' => $request->metadata,
        ]);

        return $this->resourceSuccessResponse(
            trans('message.success.update', ['resource' => 'Category']),
            new ProductResource($product)
        );
    }


     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return $this->successResponse(
            trans('message.success.delete', ['resource' => 'Category'])
        );
    }
}
