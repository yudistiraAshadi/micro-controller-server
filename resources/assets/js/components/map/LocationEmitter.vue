<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    
                    <div class="panel-heading">Location Emitter</div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">

                               <button
                                v-if="!emittingLocation"
                                type="button"
                                class="btn btn-primary"
                                @click="startEmittingLocation">
                                   Start Emitting Location
                               </button>

                                <button
                                v-else
                                type="button"
                                class="btn btn-danger active"
                                @click="stopEmittingLocation">
                                    Stop Emitting Location
                                </button>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: [
        'device-id'
    ],
    data () {
        return {
            emittingLocation: false,
            watchId: null
        }
    },
    methods: {
        setNewGeoLocation (position) {
            // axios.post('/api/device/geo-location', {
            //         device_id: this.deviceId,
            //         lat: position.coords.latitude,
            //         lng: position.coords.longitude
            //     })
            //     .catch((err) => {
            //         console.log(err.response);
            //     })
            console.log("latitude: "
                + position.coords.latitude
                + ", longitude: "
                + position.coords.longitude);
        },
        startEmittingLocation () {
            this.emittingLocation = true;
            this.watchId = navigator.geolocation.watchPosition(this.setNewGeoLocation);
        },
        stopEmittingLocation () {
            this.emittingLocation = false;
            navigator.geolocation.clearWatch(this.watchId);
        }
    }
}
</script>

<style scoped>
.row {
    padding-top: 1rem;
}
</style>
