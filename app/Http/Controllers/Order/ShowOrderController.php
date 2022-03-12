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
    
    public function show(Order $uuid)
    {
        return $this->resourceSuccessResponse(
            trans('message.success.get', ['resource' => 'Order']),
            new OrderResource($uuid)
        );
    }
}
