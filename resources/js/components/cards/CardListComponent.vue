<template>
    <div class="container">
        <div class="row justify-content-evenly mt-5">
            <div v-for="item in tabs" :key="item.name" class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        {{ item.name }}
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <CardDetail />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { defineAsyncComponent } from 'vue'
    export default {
        data() {
            return {
                tabs: [
                    {
                        name: 'buffer'
                    },
                    {
                        name: 'working'
                    },
                    {
                        name: 'done'
                    }
                ]
            }
        },
        components: {
            CardDetail: defineAsyncComponent(() => import('../cards/CardDetailComponent.vue')),
        },
    }
</script>

<style lang="scss" scoped>

</style>