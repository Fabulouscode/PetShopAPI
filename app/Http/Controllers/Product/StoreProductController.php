<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Traits\HasApiResponses;
use Illuminate\Support\Str;

class StoreProductController extends Controller
{
    use HasApiResponses;
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
}
