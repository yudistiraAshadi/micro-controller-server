<template lang="html">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Device Locations</div>

                    <div class="panel-body">
                        <baidu-map 
                            class="map"
                            :center="center"
                            :zoom="zoom"
                            @ready="latestPosition">
                            <bm-marker :position="center" />
                            <bm-navigation anchor="BMAP_ANCHOR_TOP_RIGHT" />
                            <bm-scale anchor="BMAP_ANCHOR_TOP_RIGHT"/>
                        </baidu-map>
                    </div>
                </div>u
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['device-id'],
        data () {
            return {
                center: {
                    lat: null,
                    lng: null
                },
                zoom: 15
            }
        },
        methods: {
            latestPosition () {
                axios.get('/api/device/geo-location/' + this.deviceId)
                    .then((res) => {
                        if (res.data.data.type == 'Point') {
                            this.center.lat = res.data.data.coordinates[0];
                            this.center.lng = res.data.data.coordinates[1];
                        } else {
                            console.log('Unknown JSON Format');
                        }
                    })
                    .catch((err) => {
                        console.log(err.response);
                    });
            }
        },
        watch: {
            deviceId: function () {
                this.latestPosition()
            }
        }
    }
</script>

<style scoped lang="css">
    .map {
        width: 100%;
        height: 400px;
    }
</style>
