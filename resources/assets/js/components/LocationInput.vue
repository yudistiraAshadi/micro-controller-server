<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Input Coordinates</div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <input
                                    type="number"
                                    placeholder="latitude"
                                    v-model.number="lat">
                                <input
                                    type="number"
                                    placeholder="longitude"
                                    v-model.number="lng"
                                    @keyup.enter="setNewGeoLocation">
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
</template>

<script>
export default {
    props: ['device-id'],
    data() {
        return {
            lat: null,
            lng: null
        }
    },
    methods: {
        setNewGeoLocation() {
            console.log(this.lat, this.lng);
            this.lat = this.lng = null;
        }
    }
}
</script>

<style scoped>
.row {
    padding-top: 1rem;
}
</style>
