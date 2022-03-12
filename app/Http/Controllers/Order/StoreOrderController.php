<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Traits\HasApiResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StoreOrderController extends Controller
{
    use HasApiResponses;
    
    public function store(OrderRequest $request)
    {
        $product = Order::create([
            'uuid' => Str::orderedUuid(),
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
            trans('message.success.new', ['resource' => 'Order']),
            new OrderResource($product)
        );
    }
}
