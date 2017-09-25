<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\DeviceGeoCoordinate;
use Illuminate\Http\Request;

class DeviceGeoCoordinateController extends Controller
{

    public function index()
    {
        $deviceGeoCoordinates = DeviceGeoCoordinate::all();

        return response()->json($deviceGeoCoordinates);
    }


    public function store(Request $request)
    {
        $request->validate([
            'device_id' => 'required|integer',
            'latitude' => 'bail|required|numeric|min:-90|max:90',
            'longitude' => 'bail|required|numeric|min:-180|max:180'
        ]);

        $deviceGeoCoordinate = DeviceGeoCoordinate::create($request->all());

        return response()->json($deviceGeoCoordinate, 201);
    }


    public function show($device_id)
    {
        $deviceGeoCoordinate = DeviceGeoCoordinate::where('device_id', $device_id)
            ->orderBy('updated_at', 'desc')
            ->firstorfail();

        return response()->json($deviceGeoCoordinate);
    }
}
