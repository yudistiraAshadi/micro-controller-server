@extends('layouts.app')

@section('content')

    <example></example>
    <bing-map :bing-map-api-key="bingMapApiKey" :device-id="deviceId"></bing-map>
    <coordinate-composer></coordinate-composer>

@endsection

@push('scripts-head')
    <script type='text/javascript' 
    src='http://www.bing.com/api/maps/mapcontrol'></script>
@endpush
