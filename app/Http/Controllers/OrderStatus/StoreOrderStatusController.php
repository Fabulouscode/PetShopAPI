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
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\OrderStatus\CreateOrderStatusRequest  $request
     * @return \Illuminate\Http\JsonResponse
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
