<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeviceGeoLocation extends Model
{
    const CREATED_AT = 'taken_at';
    public $updated_at = '';

    protected $touches = ['device'];

    protected $fillable = [
        'device_id',
        'lat',
        'lng'
    ];

    public function device()
    {
        return $this->belongsTo('App\Device');
    }
    
    public function scopeGetNewest($query)
    {
        return $query->orderBy('taken_at', 'desc')->first();
    }
}
