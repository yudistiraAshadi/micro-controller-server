<template lang="html">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Device Locations</div>

                    <div class="panel-body">
                        <location-composer
                            v-on:setted-new-geo-location="newGeoLocation">
                        </location-composer>
                        <div id="myMap"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['bing-map-api-key'],
    data: function() {
        return {
            deviceGeoLocation: []
        }
    },
    methods: {
        newGeoLocation(geoLocation) {
            this.deviceGeoLocation.push(geoLocation);
        }
    },
    mounted: function() {
        axios.get('/api/device/geo-location/1')
            .then((res) => {
                    this.deviceGeoLocation.push({
                        latitude: res.data.data.position.lat, 
                        longitude: res.data.data.position.lng
                    });

                    const map = new Microsoft.Maps.Map('#myMap', {
                        credentials: this.bingMapApiKey,
                        center: new Microsoft.Maps.Location(
                            14, 
                            13
                        )   
                    });

                    const center = map.getCenter();

                    //Create custom Pushpin
                    const pin = new Microsoft.Maps.Pushpin(center, {
                        color: 'red',
                        title: 'My Micro Controller',
                        subTitle: 'Taken at',
                        text: '1'
                    });

                    //Add the pushpin to the map
                    map.entities.push(pin);
                }
            )
            .catch(err => {
                console.log(err.response);
            });
    }
}
</script>

<style scoped lang="css">
    #myMap {
        position: relative;
        height: 400px;
    }
</style>
