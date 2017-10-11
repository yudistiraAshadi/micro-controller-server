<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

use App\Device;
use App\Http\Resources\DeviceGeoLocationResource;

class DeviceResource extends Resource
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
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'device_geo_locations' => 
                DeviceGeoLocationResource::collection(
                    Device::find($this->id)
                        ->deviceGeoCoordinates()
                        ->orderBy('taken_at', 'desc')
                        ->get()
                )
        ];
    }
}
