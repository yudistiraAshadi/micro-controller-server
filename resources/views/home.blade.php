@extends('layouts.app')

@section('content')

    <bing-map :bing-map-api-key="bingMapApiKey"></bing-map>

@endsection

@push('scripts-head')
    <!-- <script type='text/javascript' 
    src='http://www.bing.com/api/maps/mapcontrol'></script> -->
@endpush
