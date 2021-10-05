<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BillResource extends JsonResource
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
            'id' => $this->id,
            'collector' => $this->user_name,
            'collector_id' => $this->user_id,
            'amount' => $this->amount,
            'paid' => $this->paid,
            'rate' => $this->rate,
            'status' => $this->status,
            'reading_date' => $this->reading_date,
            'due_date' => $this->due_date,
            'disconnection_date' => $this->disconnection_date,
            'image' => $this->image
        ];
    }
}
