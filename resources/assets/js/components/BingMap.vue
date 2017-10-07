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
    data() {
        return {
            deviceGeoLocation: [],
            devicePin: null,
            map: null
        }
    },
    methods: {
        newGeoLocation(geoLocation) {
            this.deviceGeoLocation = geoLocation;

            const newLocation = new Microsoft.Maps.Location(
                this.deviceGeoLocation.lat,
                this.deviceGeoLocation.lng
            );

            // Update the pushpin
            this.devicePin.setLocation(newLocation);

            // Center the map on the new location
            // this.map.setView({center: newLocation});
        }
    },
    mounted() {
        axios.get('/api/device/geo-location/4')
            .then((res) => {
                this.deviceGeoLocation = res.data.data.position;

                this.map = new Microsoft.Maps.Map('#myMap', {
                    credentials: this.bingMapApiKey,
                    center: new Microsoft.Maps.Location(
                        res.data.data.position.lat,
                        res.data.data.position.lng
                    )   
                });

                //Create custom Pushpin
                this.devicePin = new Microsoft.Maps.Pushpin(this.map.getCenter(), {
                    color: 'red',
                    title: 'My Micro Controller',
                    // subTitle: 'Taken at ' + res.data.data.taken_at.date,
                    text: '4'
                });

                //Add the pushpin to the map
                this.map.entities.push(this.devicePin);
            })
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
