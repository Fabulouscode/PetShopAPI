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

}
