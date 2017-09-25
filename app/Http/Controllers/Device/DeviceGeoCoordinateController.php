<?php

namespace App\Http\Controllers\Device;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\DeviceGeoCoordinate;
use App\Http\Resources\DeviceGeoCoordinateResource;

class DeviceGeoCoordinateController extends Controller
{

    public function index()
    {
        $deviceGeoCoordinates = DeviceGeoCoordinate::all();

        return DeviceGeoCoordinateResource::collection($deviceGeoCoordinates);
    }


    public function show($device_id)
    {
        $deviceGeoCoordinate = DeviceGeoCoordinate::where('device_id', $device_id)
            ->orderBy('taken_at', 'desc')
            ->firstorfail();

        return new DeviceGeoCoordinateResource($deviceGeoCoordinate);
    }

    public function store(Request $request)
    {
        $request->validate([
            'device_id' => 'bail|required|integer|exists:devices,id',
            'lat' => 'required|numeric|min:-90|max:90',
            'lng' => 'required|numeric|min:-180|max:180'
        ]);

        $deviceGeoCoordinate = DeviceGeoCoordinate::create($request->all());

        return (new DeviceGeoCoordinateResource($deviceGeoCoordinate))
            ->response('', 201);
    }
}
