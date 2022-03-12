<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Traits\HasApiResponses;
use Illuminate\Http\Request;

class DeleteOrderController extends Controller
{
    use HasApiResponses;
   
  public function destroy(Order $uuid)
  {
      $uuid->delete();

      return $this->successResponse(
          trans('message.success.delete', ['resource' => 'Order'])
      );
  }
}
