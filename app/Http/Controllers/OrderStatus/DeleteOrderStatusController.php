<?php

namespace App\Http\Controllers\OrderStatus;

use App\Http\Controllers\Controller;
use App\Models\OrderStatus;
use App\Traits\HasApiResponses;
class DeleteOrderStatusController extends Controller
{
    use HasApiResponses;
      /**
     * @OA\Delete(
     * path="/api/v1/order-status/{uuid}",
     * operationId="deleteOrderStatus",
     * security={{"bearer_token": {}}},
     * tags={"Order-status"},
     * summary="Delete specific order status",
     * description="Delete specific order status",
     *      @OA\Parameter(
     *           name="uuid",
     *           in="path",
     *           @OA\Schema(
     *           type="string"
     *       )
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="Order status deleted successfully",
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
    public function destroy(OrderStatus $orderStatus)
    {
        $orderStatus->delete();

        return $this->successResponse(
            trans('message.success.delete', ['resource' => 'OrderStatus'])
        );
    }
}
