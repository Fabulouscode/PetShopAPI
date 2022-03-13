<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Traits\HasApiResponses;
use Illuminate\Http\Request;

class ShowOrderController extends Controller
{
    use HasApiResponses;
       /**
     * @OA\Get(
     * path="/api/v1/order/{uuid}",
     * operationId="show Order",
     * tags={"Orders"},
     * summary="Display fetched Order",
     * description="Display fetched Order",
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
    public function show(Order $uuid)
    {
        return $this->resourceSuccessResponse(
            trans('message.success.get', ['resource' => 'Order']),
            new OrderResource($uuid)
        );
    }
}
