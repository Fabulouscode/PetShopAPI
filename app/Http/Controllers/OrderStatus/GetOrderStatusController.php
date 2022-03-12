<?php

namespace App\Http\Controllers\OrderStatus;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderStatusCollection;
use App\Models\OrderStatus;
use App\Traits\HasApiResponses;

class GetOrderStatusController extends Controller
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
}
