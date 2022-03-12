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

class ShowProductController extends Controller
{
  use HasApiResponses;
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
}
