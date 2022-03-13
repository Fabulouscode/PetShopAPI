<?php

namespace App\Http\Controllers\OrderStatus;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOrderStatusRequest;
use App\Http\Resources\OrderStatusResource;
use App\Models\OrderStatus;
use App\Traits\HasApiResponses;
use Illuminate\Support\Str;

class StoreOrderStatusController extends Controller
{
    use HasApiResponses;
           /**
     * @OA\Post(
     * path="/api/v1/order-status/create",
     * operationId="CreateOrderStatus",
     * security={{"bearer_token": {}}},
     * tags={"Order-status"},
     * summary="Create Product",
     * description="Create new order status",
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
     *          response=201,
     *          description="message.success.new",
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
    public function store(CreateOrderStatusRequest $request)
    {
        $service = OrderStatus::create([
            'uuid' => Str::orderedUuid(),
            'title' => $request->title
        ]);
        return $this->resourceSuccessResponse(
            trans('message.success.new', ['resource' => 'OrderStatus']),
            new OrderStatusResource($service)
        );
    }
}
