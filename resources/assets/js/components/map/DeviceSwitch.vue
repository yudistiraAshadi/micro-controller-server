<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Switch Devices</div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p>Existed Devices ID: {{ devicesId }}</p>
                                <p>Current Device ID: {{ deviceId }}</p>
                                <input
                                    type="number"
                                    placeholder="New Device ID"
                                    v-model.number="newDeviceId"
                                    @keyup.enter="switchDevice">
                                <button
                                    class="btn btn-primary"
                                    @click="switchDevice">Set
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
            newDeviceId: null,
            devicesId: []
        }
    },
    methods: {
        switchDevice () {
            this.$emit('device-switched', {
                newDeviceId: this.newDeviceId
            });
            this.newDeviceId = null;
        }
    },
    created () {
        axios.get('/api/device/')
            .then((res) => {
                const devices = res.data.data;
                for (let key in devices) {
                    if(devices.hasOwnProperty(key)) {
                        this.devicesId.push(devices[key].id);
                    }
                }
            })
            .catch((err) => {
                console.log(err.response);
            });
    }
}
</script>

<style scoped>
.row {
    padding-top: 1rem;
}
</style>
