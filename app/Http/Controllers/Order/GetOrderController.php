<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderCollection;
use App\Models\Order;
use App\Traits\HasApiResponses;
use Illuminate\Http\Request;

class GetOrderController extends Controller
{
    use HasApiResponses;
    /**
     * @OA\Get(
     * path="/api/v1/orders",
     * operationId="GetOrders",
     * tags={"Orders"},
     * summary="Show all Orders",
     * description="Show all orders",
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
           trans('message.success.get', ['resource' => 'Order']),
           new OrderCollection(Order::paginate())
       );
   }
}
