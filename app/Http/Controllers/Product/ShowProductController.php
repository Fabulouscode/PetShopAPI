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
    /**
     * @OA\Get(
     * path="/api/v1/product/{uuid}",
     * operationId="singleProduct",
     * tags={"Products"},
     * summary="Display fetched product",
     * description="Display fetched product",
     *      @OA\Parameter(
     *           name="uuid",
     *           in="path",
     *           @OA\Schema(
     *           type="string"
     *       )
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="Display fetched product",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=422,
     *          description="Unprocessable Entity",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=404, description="Resource Not Found"),
     * )
     *//**
     * @OA\Put(
     * path="/api/v1/product/{uuid}",
     * operationId="updateProduct",
     * security={{"bearer_token": {}}},
     * tags={"Products"},
     * summary="Update product with uuid",
     * description="update Product",
     *      @OA\Parameter(
     *           name="uuid",
     *           in="path",
     *           @OA\Schema(
     *           type="string"
     *       )
     *       ),
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *            mediaType="application/x-www-form-urlencoded",
     *            @OA\Schema(
     *               type="object",
     *               required={"category_uuid", "title", "price", "description", "metadata"},
     *               @OA\Property(property="category_uuid", type="text"),
     *               @OA\Property(property="title", type="text"),
     *               @OA\Property(property="price", type="number"),
     *               @OA\Property(property="description", type="text"),
     *               @OA\Property(property="metadata", type="object", example={"image":"string","brand": "string"}),
     *            ),
     *        ),
     *    ),
     *      @OA\Response(
     *          response=200,
     *          description="Product updated successfully",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=422,
     *          description="Unprocessable Entity",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=404, description="Resource Not Found"),
     * )
     */
  use HasApiResponses;
    public function show(Product $uuid)
    {
        return $this->resourceSuccessResponse(
            trans('message.success.get', ['resource' => 'Product']),
            new ProductResource($uuid)
        );
    }
}
