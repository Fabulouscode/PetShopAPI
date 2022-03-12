<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Traits\HasApiResponses;


class DeleteCategoryController extends Controller
{
    use HasApiResponses;
      /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $uuid)
    {
        $uuid->delete();

        return $this->successResponse(
            trans('message.success.delete', ['resource' => 'Category'])
        );
    }
}
