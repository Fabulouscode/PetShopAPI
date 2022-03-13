<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Traits\HasApiResponses;
use Illuminate\Http\Request;

class UpdateOrderController extends Controller
{
    use HasApiResponses;
        /**
     * @OA\Put(
     * path="/api/v1/order/{uuid}",
     * operationId="updateOrder",
     * security={{"bearer_token": {}}},
     * tags={"Orders"},
     * summary="Update order by uuid",
     * description="update order",
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
     *               required={"user_id", "title", "price", "description", "metadata"},
     *               @OA\Property(property="user_id", type="text"),
     *               @OA\Property(property="order_status_id", type="text"),
     *               @OA\Property(property="amount", type="number"),
     *               @OA\Property(property="products", type="text"),
     *               @OA\Property(property="address", type="text"),
     *               @OA\Property(property="delivery_fee", type="text"),
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
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $product = $order->update([
            'user_id' => $request->user_id,
            'order_status_id' => $request->order_status_id,
            'amount' => $request->amount,
            'products' => $request->products,
            "address" => $request->address,
            "delivery_fee" => $request->delivery_fee,
        ]);

        return $this->resourceSuccessResponse(
            trans('message.success.update', ['resource' => 'Order']),
            new OrderResource($product)
        );
    }
}
