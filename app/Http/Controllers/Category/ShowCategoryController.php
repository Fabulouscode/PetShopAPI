<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Traits\HasApiResponses;

class ShowCategoryController extends Controller
{
    use HasApiResponses;
     /**
     * @OA\Get(
     * path="/api/v1/category/{uuid}",
     * operationId="show Category",
     * tags={"Categories"},
     * summary="Display fetched Category",
     * description="Display fetched Category",
     *      @OA\Parameter(
     *           name="uuid",
     *           in="path",
     *           @OA\Schema(
     *           type="string"
     *       )
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="Display fetched category",
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
    public function show(Category $uuid)
    {
        return $this->resourceSuccessResponse(
            trans('message.success.get', ['resource' => 'Category']),
            new CategoryResource($uuid)
        );
    }
}
