<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ActionEmployeeResource extends JsonResource
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
            'employee_id' => $this->employee_id,
            'status' => $this->status,
            'from_date' => $this->from_date,
            'to_date' => $this->to_date,
            'comments' => $this->comments,
            'images' => $this->images,
            'rejected_reason' => $this->rejected_reason,
            'items' => $this->items,
        ];
    }
}
