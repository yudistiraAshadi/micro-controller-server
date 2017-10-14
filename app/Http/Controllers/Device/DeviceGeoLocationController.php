<?php

namespace App\Http\Controllers\Device;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\DeviceGeoLocation;
use App\Http\Resources\DeviceGeoLocationResource;
use App\Events\LocationChanged;

class DeviceGeoLocationController extends Controller
{

    public function index()
    {
        $deviceGeoLocations = DeviceGeoLocation::all();

        return DeviceGeoLocationResource::collection($deviceGeoLocations);
    }


    public function show($device_id)
    {
        $deviceGeoLocation = DeviceGeoLocation::where('device_id', $device_id)
            ->getNewest();

        return new DeviceGeoLocationResource($deviceGeoLocation);
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'device_id' => 'bail|required|integer|exists:devices,id',
            'lat' => 'required|numeric|min:-90|max:90',
            'lng' => 'required|numeric|min:-180|max:180'
        ]);

        // Store the new geo location
        $deviceGeoLocation = DeviceGeoLocation::create($request->all());

        // Announce that the new geo location has been updated
        broadcast(new LocationChanged($deviceGeoLocation))->toOthers();

        return (new DeviceGeoLocationResource($deviceGeoLocation))
            ->response('', 201);
    }
}
