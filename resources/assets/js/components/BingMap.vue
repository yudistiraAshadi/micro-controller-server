<template lang="html">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Device Locations</div>

                    <div class="panel-body">
                        <div id="myMap"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: [
        'bing-map-api-key',
        'device-id'
        ],
    data: function () {
        return {
            deviceGeoCoordinate: []
        }
    },
    mounted: function() {
        axios.get('/api/device/geo-coordinate/' + this.deviceId)
            .then(res => {
                this.deviceGeoCoordinate = res.data.data
            })
            .then(() => {
                    const map = new Microsoft.Maps.Map('#myMap', {
                        credentials: this.bingMapApiKey,
                        center: new Microsoft.Maps.Location(
                            this.deviceGeoCoordinate.position.lat, 
                            this.deviceGeoCoordinate.position.lng
                        )   
                    });

                    const center = map.getCenter();

                    //Create custom Pushpin
                    const pin = new Microsoft.Maps.Pushpin(center, {
                        color: 'red',
                        title: 'My Micro Controller',
                        subTitle: 'Taken at' + this.deviceGeoCoordinate.taken_at.date,
                        text: this.deviceId
                    });

                    //Add the pushpin to the map
                    map.entities.push(pin);
                }
            )
            .catch(err => {
                console.log(err);
            });
    }
}
</script>

<style lang="css">
    #myMap {
        position: relative;
        height: 400px;
    }
</style>
