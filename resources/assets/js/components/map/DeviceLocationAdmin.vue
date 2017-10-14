<template>
    <div class="container">

        <!-- map/DeviceSwitch.vue -->
        <device-switch
            :device-id="deviceId"
            v-on:device-switched="switchDevice" />

        <!-- map/LocationInput.vue -->
        <location-input
            :device-id="deviceId"
            :center="center" />

        <!-- map/BaiduMapWrapper.vue -->
        <baidu-map-wrapper
            :device-id="deviceId"
            :center="center"
            :zoom="zoom" />

    </div>
</template>

<script>
    export default {
        data () {
            return {
                deviceId: 1,
                center: {
                    lat: null,
                    lng: null
                },
                zoom: 15,
                foo: null
            }
        },
        methods: {
            switchDevice (data) {
                this.deviceId = data.newDeviceId;
            },
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
        },
        created () {
            this.latestPosition();

            Echo.channel('device-location')
                .listen('LocationChanged', (e) => {
                    this.center.lat = e.deviceGeoLocation.lat;
                    this.center.lng = e.deviceGeoLocation.lng;
                });
        }
    }
</script>

<style>
</style>
