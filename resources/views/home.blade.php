@extends('layouts.app')

@section('content')

    <coordinate-composer></coordinate-composer>
    <bing-map :bing-map-api-key="bingMapApiKey" :device-id="deviceId"></bing-map>

@endsection

@push('scripts-head')
    <!-- <script type='text/javascript' 
    src='http://www.bing.com/api/maps/mapcontrol'></script> -->
@endpush
