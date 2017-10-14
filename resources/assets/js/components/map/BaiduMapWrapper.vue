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
                            :zoom="localZoom"
                            @zoomend="syncZoom">
                            <bm-marker :position="center" />
                            <bm-navigation anchor="BMAP_ANCHOR_TOP_RIGHT" />
                            <bm-scale anchor="BMAP_ANCHOR_TOP_RIGHT"/>
                        </baidu-map>
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
            'center',
            'zoom'
        ],
        data () {
            return {
                localZoom: this.zoom
            }
        },
        methods: {
            syncZoom (e) {
                this.localZoom = e.target.getZoom()
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
