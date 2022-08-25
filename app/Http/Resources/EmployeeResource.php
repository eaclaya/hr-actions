<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
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
            'id_number' => $this->id_number,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'profile' => $this->profile,
            'account_id' => $this->account_id,
        ];
    }
}
