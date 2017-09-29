<template>
    <!-- <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Input Coordinates</div>

                    <div class="panel-body">
                        <div class="row"> -->
                            <div class="col-md-12">
                                <input
                                    type="number"
                                    placeholder="latitude"
                                    v-model.number="latitude">
                                <input
                                    type="number"
                                    placeholder="longitude"
                                    v-model.number="longitude"
                                    @keyup.enter="setNewGeoLocation">
                                <button
                                    class="btn btn-primary"
                                    @click="setNewGeoLocation">Set 
                                </button>
                            </div>
                        <!-- </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</template>

<script>
export default {
    data: function() {
        return {
            latitude: null,
            longitude: null
        }
    },
    methods: {
        setNewGeoLocation: function() {
            this.$emit('setted-new-geo-location', {
                latitude: this.latitude,
                longitude: this.longitude
            });
            this.latitude = this.longitude = null;
        }
    }
}
</script>

<style scoped>
.row {
    padding-top: 1rem;
}
</style>
