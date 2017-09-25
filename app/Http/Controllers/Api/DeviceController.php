<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{

    public function index()
    {
        $devices = Device::all();

        return response()->json($devices);
    }


    public function store()
    {
        $device = Device::create();

        return response()->json($device);
    }


    public function show($id)
    {
        $device = Device::findorfail($id);

        return response()->json($device);
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $device = Device::findorfail($id);
        $device->delete();

        return 204;
    }
}
