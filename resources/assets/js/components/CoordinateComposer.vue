<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Input Coordinates</div>

                    <div class="panel-body">
                        <div class="coordinate-composer">
                            <input
                                type="number"
                                placeholder="latitude"
                                v-model.number="lat"
                                @keyup.enter="setNewCoordinates">
                            <input
                                type="number"
                                placeholder="longitude"
                                v-model.number="lng"
                                @keyup.enter="setNewCoordinates">
                            <button
                                class="btn btn-primary"
                                @click="setNewCoordinates">
                            Set 
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function() {
        return {
            lat: 0,
            lng: 0
        }
    },
    methods: {
        setNewCoordinates: function() {
            console.log(this.lat + ', ' + this.lng);
        }
    }
}
</script>

<style scoped>
.row {
    padding-top: 1rem;
}
</style>
