<?php

namespace App\Http\API\Resources\Booking;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BookingCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array<mixed>
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
        ];
    }
}
