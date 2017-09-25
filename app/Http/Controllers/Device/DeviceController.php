<?php

namespace App\Http\Controllers\Device;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Device;
use App\Http\Resources\DeviceResource;

class DeviceController extends Controller
{

    public function index()
    {
        $devices = Device::all();

        return DeviceResource::collection($devices);
    }


    public function show($id)
    {
        $device = Device::findorfail($id);

        return new DeviceResource($device);
    }


    public function store()
    {
        $device = Device::create();

        return (new DeviceResource($device))
            ->response('', 201);
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $device = Device::findorfail($id);
        $device->delete();

        return response()->json(null, 204);
    }
}
