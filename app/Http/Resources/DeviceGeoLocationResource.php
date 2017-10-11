<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class DeviceGeoLocationResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'type' => 'Point',
            'coordinates' => [$this->lat, $this->lng],
            'taken_at' => $this->taken_at,
        ];
    }
}
