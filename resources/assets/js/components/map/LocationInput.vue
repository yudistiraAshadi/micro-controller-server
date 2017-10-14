<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    
                    <div class="panel-heading">Input Coordinates</div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-inline">
                                    <div class="form-group">
                                        <label for="latitude">
                                            Latitude
                                        </label>
                                        <input
                                            type="number"
                                            class="form-control"
                                            v-model="newLocation.lat">
                                    </div>
                                    <div class="form-group">
                                        <label for="longitude">
                                            Longitude
                                        </label>
                                        <input
                                            type="number"
                                            class="form-control"
                                            v-model="newLocation.lng">
                                    </div>
                                    <button
                                        class="btn btn-primary"
                                        @click="setNewGeoLocation">Set
                                    </button>
                                </div>
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
        'device-id',
        'center'
    ],
    data () {
        return {
            newLocation: this.center
        }
    },
    methods: {
        setNewGeoLocation () {
            axios.post('/api/device/geo-location', {
                    device_id: this.deviceId,
                    lat: this.newLocation.lat,
                    lng: this.newLocation.lng
                })
                .catch((err) => {
                    console.log(err.response);
                })
        }
    }
}
</script>

<style scoped>
.row {
    padding-top: 1rem;
}
</style>
