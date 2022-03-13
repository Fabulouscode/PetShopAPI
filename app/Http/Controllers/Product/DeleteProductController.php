<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Traits\HasApiResponses;
use Illuminate\Http\Request;

class DeleteProductController extends Controller
{
    use HasApiResponses;

        /**
     * @OA\Delete(
     * path="/api/v1/product/{uuid}",
     * operationId="deleteProduct",
     * security={{"bearer_token": {}}},
     * tags={"Products"},
     * summary="Delete specific product",
     * description="Delete specific product",
     *      @OA\Parameter(
     *           name="uuid",
     *           in="path",
     *           @OA\Schema(
     *           type="string"
     *       )
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="message.success.delete",
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
    public function destroy(Product $product)
    {
        $product->delete();

        return $this->successResponse(
            trans('message.success.delete', ['resource' => 'Category'])
        );
    }
}
