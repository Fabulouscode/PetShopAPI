<?php

namespace App\Http\Controllers\OrderStatus;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderStatusCollection;
use App\Models\OrderStatus;
use App\Traits\HasApiResponses;

class GetOrderStatusController extends Controller
{
    use HasApiResponses;
  /**
     * @OA\Get(
     * path="/api/v1/order-status",
     * operationId="GetOrderStatus",
     * tags={"Order-status"},
     * summary="Show all Order status",
     * description="Show all order status",
     *      @OA\Parameter(
     *           name="page",
     *           in="query",
     *           @OA\Schema(
     *           type="integer"
     *       )
     *       ),
     *      @OA\Parameter(
     *           name="limit",
     *           in="query",
     *           @OA\Schema(
     *           type="integer"
     *       )
     *       ),
     *      @OA\Parameter(
     *           name="sortBy",
     *           in="query",
     *           @OA\Schema(
     *           type="string"
     *       )
     *       ),
     *      @OA\Parameter(
     *           name="desc",
     *           in="query",
     *           @OA\Schema(
     *           type="boolean"
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
    public function index()
    {
        return $this->resourceSuccessResponse(
            trans('message.success.get', ['resource' => 'OrderStatus']),
            new OrderStatusCollection(OrderStatus::paginate())
        );
    }
}
