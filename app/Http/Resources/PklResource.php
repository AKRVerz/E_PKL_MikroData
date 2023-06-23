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
            'mahasiswa_id' => $this->mahasiswa_id,
            'dospem_id' => $this->dospem_id,
            'dpl_id' => $this->dpl_id,
        ];
    }
}
