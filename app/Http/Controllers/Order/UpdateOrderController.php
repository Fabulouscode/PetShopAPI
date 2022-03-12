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
    
   
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $product = $order->update([
            'user_id' => $request->user_id,
            'order_status_id' => $request->order_status_id,
            'amount' => $request->amount,
            'products' => $request->products,
            "address" => $request->address,
            "delivery_fee" => $request->delivery_fee,
            "created_at" => $request->created_at,
            "updated_at" => $request->updated_at,
            "shipped_at" => $request->shipped_at,
        ]);

        return $this->resourceSuccessResponse(
            trans('message.success.update', ['resource' => 'Order']),
            new OrderResource($product)
        );
    }
}
