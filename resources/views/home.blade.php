@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                
                <div class="panel-heading">Device Locations</div>

                <div class="panel-body">
                    <div id="myMap" style="position:relative;height:400px;"></div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type='text/javascript' 
src='http://www.bing.com/api/maps/mapcontrol?callback=GetMap' 
async defer></script>

<script type='text/javascript'>
    function GetMap() {
        var map = new Microsoft.Maps.Map('#myMap', {
            credentials: '{{ env('BING_MAP_API_KEY') }}',
            center: new Microsoft.Maps.Location(
                {{ $deviceGeoCoordinate->lat }}, 
                {{ $deviceGeoCoordinate->lng }}
            )   
        });

        var center = map.getCenter();

        //Create custom Pushpin
        var pin = new Microsoft.Maps.Pushpin(center, {
            color: 'red',
            title: 'My Micro Controller',
            subTitle: 'Taken at {{ $deviceGeoCoordinate->taken_at }}',
            text: '{{ $device->id }}'
        });

        //Add the pushpin to the map
        map.entities.push(pin);
    }
</script>
@endpush
