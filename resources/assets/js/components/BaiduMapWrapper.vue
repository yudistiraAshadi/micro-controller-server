<template lang="html">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Device Locations</div>

                    <div class="panel-body">
                        <baidu-map class="map" center="北京"></baidu-map>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
    }
</script>

<style scoped lang="css">
    .map {
        width: 100%;
        height: 400px;
    }
</style>
