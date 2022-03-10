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

class CategoryController extends Controller
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
            trans('message.success.get', ['resource' => 'Category']),
            new CategoryCollection(Category::paginate())
        );
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Category\CrateCategoryRequest  $request
     * @return \Illuminate\Http\JsonResponse
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Category $category)
    {
        return $this->resourceSuccessResponse(
            trans('message.success.get', ['resource' => 'Category']),
            new CategoryResource($category)
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Category\CreateCategoryRequest  $request
     * @param  \App\Models\Category  $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CreateCategoryRequest $request, Category $category)
    {
        $categoryData = array_merge(
            $request->validated(),
            [
                'slug' => Str::slug($request->title),
            ]
        );

        $category->update($categoryData);

        return $this->resourceSuccessResponse(
            trans('message.success.update', ['resource' => 'Category']),
            new CategoryResource($category)
        );
    }

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return $this->successResponse(
            trans('message.success.delete', ['resource' => 'Category'])
        );
    }
}
