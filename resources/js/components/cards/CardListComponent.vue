<template>
    <div class="container">
        <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">{{ user.name }}</a>
            </div>
        </nav>
        <div class="row justify-content-evenly mt-5">
            <div v-for="item in panels" :key="item.id" class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class="row justify-content-between">
                            <span class="md-display-1">
                                {{ item.name }}
                            </span>
                            <span class="md-body-1">{{ item.cards.length }}</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-end">
                            <md-button class="md-fab md-mini md-icon-button md-raised md-primary mb-4" @click="addCard(item.id)">
                                <md-icon>+</md-icon>
                            </md-button>

                            <div class="col-md-12 mb-2" v-for="card in item.cards" :key="card.id">
                                <CardDetail :card="card" @click="editCard(card)" class="cursor-pointer"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <modal name="example">
            <CreateCardForm :panelId="currentPanel"/>
        </modal>
    </div>
</template>

<script>
    import { defineAsyncComponent } from 'vue'
    import { mapActions, mapState } from 'vuex'
    export default {
        data() {
            return {
                currentPanel: null,
                currentCard: null,
                user: JSON.parse(localStorage.getItem('user'))
            }
        },
        created () {
            this.loadData()
        },
        components: {
            CardDetail: defineAsyncComponent(() => import('../cards/CardDetailComponent.vue')),
            CreateCardForm: defineAsyncComponent(() => import('../cards/CreateCardFormComponent.vue'))
        },
        computed: {
            ...mapState('panel', ['panels']),
        },
        methods: {
            ...mapActions('panel', ['loadData']),
            addCard(panelId) {
                this.currentPanel = panelId
                this.$modal.show('example')
            },
            // editCard(card) {
            //     this.currentCard = card
            //     this.$modal.show('example')
            // }
        }
    }
</script>

<style lang="scss" scoped>

</style>