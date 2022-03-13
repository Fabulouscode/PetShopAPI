<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Traits\HasApiResponses;
use Illuminate\Http\Request;

class DeleteOrderController extends Controller
{
    use HasApiResponses;
   /**
     * @OA\Delete(
     * path="/api/v1/order/{uuid}",
     * operationId="deleteOrder",
     * security={{"bearer_token": {}}},
     * tags={"Orders"},
     * summary="Delete specific Order",
     * description="Delete specific Order",
     *      @OA\Parameter(
     *           name="uuid",
     *           in="path",
     *           @OA\Schema(
     *           type="string"
     *       )
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="Order deleted successfully",
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
  public function destroy(Order $uuid)
  {
      $uuid->delete();

      return $this->successResponse(
          trans('message.success.delete', ['resource' => 'Order'])
      );
  }
}
