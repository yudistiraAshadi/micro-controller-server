<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Device;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $device = Device::find(1);
        $deviceGeoCoordinate = $device->deviceGeoCoordinates()
            ->getNewest();

        return view('home')
            ->with('device', $device)
            ->with('deviceGeoCoordinate', $deviceGeoCoordinate);
    }
}
