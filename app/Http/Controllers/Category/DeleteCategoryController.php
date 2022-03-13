<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Traits\HasApiResponses;


class DeleteCategoryController extends Controller
{
    use HasApiResponses;
    
     /**
     * @OA\Delete(
     * path="/api/v1/category/{uuid}",
     * operationId="deleteCategory",
     * security={{"bearer_token": {}}},
     * tags={"Categories"},
     * summary="Delete specific Category",
     * description="Delete specific Category",
     *      @OA\Parameter(
     *           name="uuid",
     *           in="path",
     *           @OA\Schema(
     *           type="string"
     *       )
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="Category deleted successfully",
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
    public function destroy(Category $uuid)
    {
        $uuid->delete();

        return $this->successResponse(
            trans('message.success.delete', ['resource' => 'Category'])
        );
    }
}
