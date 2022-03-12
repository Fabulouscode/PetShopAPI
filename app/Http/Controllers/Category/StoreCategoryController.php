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
