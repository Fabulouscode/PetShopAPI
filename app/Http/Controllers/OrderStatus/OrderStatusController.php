<?php

namespace App\Http\Controllers\OrderStatus;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOrderStatusRequest;
use App\Http\Resources\OrderStatusCollection;
use App\Http\Resources\OrderStatusResource;
use App\Models\OrderStatus;
use App\Traits\HasApiResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderStatusController extends Controller
{
    use HasApiResponses;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->resourceSuccessResponse(
            trans('message.success.get', ['resource' => 'OrderStatus']),
            new OrderStatusCollection(OrderStatus::paginate())
        );
    }

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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderStatus  $orderStatus
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(OrderStatus $orderStatus)
    {
        return $this->resourceSuccessResponse(
            trans('message.success.get', ['resource' => 'OrderStatus']),
            new OrderStatusResource($orderStatus)
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\OrderStatus\CreateOrderStatusRequest  $request
     * @param  \App\Models\OrderStatus  $orderStatus
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CreateOrderStatusRequest $request, OrderStatus $orderStatus)
    {
       
        $order = $orderStatus->update($request->validated());

        return $this->resourceSuccessResponse(
            trans('message.success.update', ['resource' => 'OrderStatus']),
            new OrderStatusResource($order)
        );
    }

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderStatus  $orderStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderStatus $orderStatus)
    {
        $orderStatus->delete();

        return $this->successResponse(
            trans('message.success.delete', ['resource' => 'OrderStatus'])
        );
    }
}
