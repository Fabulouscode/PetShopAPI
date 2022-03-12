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
     * Display the specified resource.
     *
     * @param  \App\Models\OrderStatus  $orderStatus
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(OrderStatus $uuid)
    {
        return $this->resourceSuccessResponse(
            trans('message.success.get', ['resource' => 'OrderStatus']),
            new OrderStatusResource($uuid)
        );
    }
}
