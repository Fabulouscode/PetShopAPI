<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryCollection;
use App\Models\Category;
use App\Traits\HasApiResponses;
class GetCategoryController extends Controller
{
    use HasApiResponses;
    
    public function index()
    {
        return $this->resourceSuccessResponse(
            trans('message.success.get', ['resource' => 'Category']),
            new CategoryCollection(Category::paginate())
        );
    }
}
