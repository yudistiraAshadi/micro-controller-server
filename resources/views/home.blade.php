@extends('layouts.app')

@section('content')

    <device-switch :device-id="deviceId" v-on:device-switched="switchDevice"></device-switch>
    <location-input :device-id="deviceId"></location-input>
    <baidu-map-wrapper :device-id="deviceId"></baidu-map-wrapper>

@endsection