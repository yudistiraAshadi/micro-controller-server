<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    public function deviceGeoCoordinates()
    {
        return $this->hasMany('App\DeviceGeoLocation');
    }
}
