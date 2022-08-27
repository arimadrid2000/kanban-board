<template>
    <div class="container">
        <md-progress-spinner :md-diameter="100" :md-stroke="10" md-mode="indeterminate" v-show="loading"></md-progress-spinner>
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
                user: JSON.parse(localStorage.getItem('user')),
                loading: true
            }
        },
        async created () {
            await this.loadData()
            const firstCardsCreated = await this.createNewCard()
            if (firstCardsCreated === 'ok') {
                this.loading = false
            }
        },
        components: {
            CardDetail: defineAsyncComponent(() => import('../cards/CardDetailComponent.vue')),
            CreateCardForm: defineAsyncComponent(() => import('../cards/CreateCardFormComponent.vue'))
        },
        computed: {
            ...mapState('panel', ['panels']),
        },
        methods: {
            ...mapActions('panel', ['loadData', 'createCard']),
            addCard(panelId) {
                this.currentPanel = panelId
                this.$modal.show('example')
            },
            async createNewCard() {
                let panelsEmpty = 0
                this.panels.forEach(panel => {
                    if (panel.cards.length === 0) {
                        panelsEmpty++
                    }
                })
                if (panelsEmpty === 3) {
                    const buffer = this.panels.find(panel => panel.name === 'Buffer')
                    const working = this.panels.find(panel => panel.name === 'Working')
                    console.log(this.panels)
                    const date = new Date()
                    const day = date.getDate()
                    const month = date.getMonth()
                    const year = date.getFullYear()
                    const end_date = `${year}-${month}-${day}`
                    const firtsCard = {
                        name: 'Agregar subtareas al kanban',
                        end_date,
                        panel_id: buffer.id,
                        user_id: this.user.id
                    }
                    const secondCard = {
                        name: 'Testing Kanban',
                        end_date,
                        panel_id: working.id,
                        user_id: this.user.id
                    }
                    const resp1 = await this.createCard(firtsCard)
                    const resp2 = await this.createCard(secondCard)
                    if (resp1 && resp2) {
                        await this.loadData()
                        return 'ok'
                    }
                } else {
                    return 'ok'
                }
            }
            // editCard(card) {
            //     this.currentCard = card
            //     this.$modal.show('example')
            // }
        }
    }
</script>

<style lang="scss" scoped>

</style>