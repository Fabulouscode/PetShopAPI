<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Traits\HasApiResponses;
use Illuminate\Support\Str;

class UpdateCategoryController extends Controller
{
    use HasApiResponses;
/**
     * @OA\Put(
     * path="/api/v1/category/{uuid}",
     * operationId="updateCategory",
     * security={{"bearer_token": {}}},
     * tags={"Categories"},
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
     *             
     *               @OA\Property(property="title", type="text"),
     *               @OA\Property(property="slug", type="text"),
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
    public function update(CreateCategoryRequest $request, Category $uuid)
    {
        $categoryData = array_merge(
            $request->validated(),
            [
                'slug' => Str::slug($request->title),
            ]
        );

        $uuid->update($categoryData);

        return $this->resourceSuccessResponse(
            trans('message.success.update', ['resource' => 'Category']),
            new CategoryResource($uuid)
        );
    }

}
