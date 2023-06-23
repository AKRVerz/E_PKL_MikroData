<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PklResource extends JsonResource
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
            'mahasiswa_id' => $this->whenLoaded('mahasiswa'),
            'dosbing_id' => $this->whenLoaded('dosbing'),
            'dpl_id' => $this->whenLoaded('dpl'),
        ];
    }
}
