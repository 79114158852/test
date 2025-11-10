<?php

namespace App\Http\API\Resources\Guide;

use Illuminate\Http\Resources\Json\ResourceCollection;

class GuideCollection extends ResourceCollection
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
