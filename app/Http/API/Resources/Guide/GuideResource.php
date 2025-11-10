<?php

namespace App\Http\API\Resources\Guide;

use Illuminate\Http\Resources\Json\JsonResource;

class GuideResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array<mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'experience_years' => $this->experience_years,
            'is_active' => $this->is_active,
        ];
    }
}
