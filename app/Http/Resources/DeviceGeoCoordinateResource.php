<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class DeviceGeoCoordinateResource extends Resource
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
            'position' => [
                'lat' => $this->latitude,
                'lng' => $this->longitude,
            ],
            'taken_at' => $this->taken_at,
        ];
    }
}
