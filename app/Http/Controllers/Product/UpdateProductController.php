<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Traits\HasApiResponses;
use Illuminate\Http\Request;

class UpdateProductController extends Controller
{
    use HasApiResponses;
   
    public function update(UpdateProductRequest $request, Product $uuid)
    {
        $product = $uuid->update([
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
}
