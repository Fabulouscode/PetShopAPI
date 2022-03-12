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
     
    public function update(CreateOrderStatusRequest $request, OrderStatus $orderStatus)
    {
       
        $order = $orderStatus->update($request->validated());

        return $this->resourceSuccessResponse(
            trans('message.success.update', ['resource' => 'OrderStatus']),
            new OrderStatusResource($order)
        );
    }
}
