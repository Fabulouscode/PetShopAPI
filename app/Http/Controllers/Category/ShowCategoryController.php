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
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Category $uuid)
    {
        return $this->resourceSuccessResponse(
            trans('message.success.get', ['resource' => 'Category']),
            new CategoryResource($uuid)
        );
    }
}
