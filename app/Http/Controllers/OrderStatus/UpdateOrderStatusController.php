<?php

namespace App\Http\Controllers\OrderStatus;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOrderStatusRequest;
use App\Http\Resources\OrderStatusResource;
use App\Models\OrderStatus;
use App\Traits\HasApiResponses;

class UpdateOrderStatusController extends Controller
{
    use HasApiResponses;
     /**
     * @OA\Put(
     * path="/api/v1/order-status/{uuid}",
     * operationId="updateOrderStatus",
     * security={{"bearer_token": {}}},
     * tags={"Order-status"},
     * summary="Update order status with uuid",
     * description="update Product",
     *      @OA\Parameter(
     *           name="uuid",
     *           in="path",
     *           @OA\Schema(
     *           type="string"
     *       )
     *       ),
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *            mediaType="application/x-www-form-urlencoded",
     *            @OA\Schema(
     *               type="object",
     *               @OA\Property(property="title", type="text"),
     *            ),
     *        ),
     *    ),
     *      @OA\Response(
     *          response=200,
     *          description="message.success.update",
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
    public function update(CreateOrderStatusRequest $request, OrderStatus $orderStatus)
    {
       
        $order = $orderStatus->update($request->validated());

        return $this->resourceSuccessResponse(
            trans('message.success.update', ['resource' => 'OrderStatus']),
            new OrderStatusResource($order)
        );
    }
}
