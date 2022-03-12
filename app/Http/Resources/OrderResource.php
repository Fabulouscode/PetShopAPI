<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "user" => new UserResource($this->user),
            "order_status" => new OrderStatusResource($this->orderStatus),
            "amount" => $this->amount,
            "uuid" => $this->uuid,
            "products" => $this->products,
            "address" => $this->address,
            "delivery_fee" => $this->delivery_fee,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "shipped_at" => $this->shipped_at,
        ];
    }
}
