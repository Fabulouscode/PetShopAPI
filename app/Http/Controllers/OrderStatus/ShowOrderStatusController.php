<?php

namespace App\Http\Controllers\OrderStatus;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderStatusResource;
use App\Models\OrderStatus;
use App\Traits\HasApiResponses;

class ShowOrderStatusController extends Controller
{
    use HasApiResponses;
    /**
     * @OA\Get(
     * path="/api/v1/order-status/{uuid}",
     * operationId="show order status",
     * tags={"Order-status"},
     * summary="Display fetched order status",
     * description="Display fetched order status",
     *      @OA\Parameter(
     *           name="uuid",
     *           in="path",
     *           @OA\Schema(
     *           type="string"
     *       )
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="message.success.get",
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
    public function show(OrderStatus $uuid)
    {
        return $this->resourceSuccessResponse(
            trans('message.success.get', ['resource' => 'OrderStatus']),
            new OrderStatusResource($uuid)
        );
    }
}
