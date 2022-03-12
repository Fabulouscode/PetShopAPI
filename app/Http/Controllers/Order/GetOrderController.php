<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderCollection;
use App\Models\Order;
use App\Traits\HasApiResponses;
use Illuminate\Http\Request;

class GetOrderController extends Controller
{
    use HasApiResponses;
    
   public function index()
   {
       return $this->resourceSuccessResponse(
           trans('message.success.get', ['resource' => 'Order']),
           new OrderCollection(Order::paginate())
       );
   }
}
