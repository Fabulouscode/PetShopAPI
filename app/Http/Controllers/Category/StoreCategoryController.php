<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Traits\HasApiResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StoreCategoryController extends Controller
{
    use HasApiResponses;
    
         /**
     * @OA\Post(
     * path="/api/v1/category/create",
     * operationId="CreateCategory",
     * security={{"bearer_token": {}}},
     * tags={"Categories"},
     * summary="Create Product",
     * description="Create new Category",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *            mediaType="application/x-www-form-urlencoded",
     *            @OA\Schema(
     *               type="object",
     *              
     *               @OA\Property(property="title", type="text"),
     *               @OA\Property(property="slug", type="text"),
     *           
     *            ),
     *        ),
     *    ),
     *      @OA\Response(
     *          response=201,
     *          description="message.success.new",
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
     
    public function store(CreateCategoryRequest $request)
    {
        $categoryData = array_merge(
            $request->validated(),
            [
                'slug' => Str::slug($request->title),
                'uuid' => Str::orderedUuid(),
            ]
            
        );

        $service = Category::create($categoryData);

        return $this->resourceSuccessResponse(
            trans('message.success.new', ['resource' => 'Category']),
            new CategoryResource($service)
        );
    }

}
