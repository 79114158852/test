<?php

namespace App\Http\API\Resources\Booking;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * @param  \Illuminate\Http\Request  $request
     * @return array<mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'tour_name' => $this->tour_name,
            'hunter_name' => $this->hunter_name,
            'date' => $this->date,
            'participants_count' => $this->participants_count,
            'guide' => $this->guide
        ];
    }
}
