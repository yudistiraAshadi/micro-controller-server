<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeviceGeoCoordinate extends Model
{
    public $updated_at = '';

    protected $fillable = [
        'device_id',
        'latitude',
        'longitude'
    ];
}
