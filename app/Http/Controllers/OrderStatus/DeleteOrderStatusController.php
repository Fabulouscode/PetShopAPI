<?php

namespace App\Http\Controllers\OrderStatus;

use App\Http\Controllers\Controller;
use App\Models\OrderStatus;
use App\Traits\HasApiResponses;
class DeleteOrderStatusController extends Controller
{
    use HasApiResponses;
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
