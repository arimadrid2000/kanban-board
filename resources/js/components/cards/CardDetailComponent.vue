<template>
    <div>
        <md-card :class="[isLate ? 'md-accent' : 'md-primary']" md-with-hover>
            <md-card-area>
                <md-card-header>
                    <div class="md-title">{{ shortText }}</div>
                    <div class="md-subhead">Fecha de expiracion: {{ card.end_date }}</div>
                </md-card-header>
                <md-card-content v-show="isLate">
                    Esta tarjeta ha expirado!
                </md-card-content>
            </md-card-area>
            <md-card-actions md-alignment="space-between">
                <md-button @click="remove(card.id)">Eliminar</md-button>
                <md-button @click="edit(card.id)">Editar</md-button>
                <md-menu md-size="big" md-direction="bottom-end">
                    <md-button md-menu-trigger>
                        Mover
                    </md-button>
                    <md-menu-content>
                        <md-menu-item v-for="item in panels" :key="item.id" @click="changeCardPanel(item.id)">
                        <span>{{ item.name }}</span>
                        </md-menu-item>
                    </md-menu-content>
                </md-menu>
            </md-card-actions>
        </md-card>
        <md-dialog-alert
            :md-active.sync="showPopUp"
            md-content="Felicitaciones por lograrlo!"
            md-confirm-text="Cerrar" />
    </div>
</template>

<script>
import { mapActions, mapState } from 'vuex';
import Swal from 'sweetalert2';

export default {
    data() {
        return {
            user: JSON.parse(localStorage.getItem('user')),
            showPopUp: false,
            isLate: false
        }
    },
    props: {
        card: {
            type: Object,
            default: null
        }
    },
    computed: {
        ...mapState('panel', ['panels']),
        shortText() {
            return ( this.card.name.length > 20)
                ? this.card.name.substring(0,20) + '...'
                : this.card.name
        },
    },
    created () {
        this.verifyEndDate()
    },
    methods: {
        ...mapActions('panel', ['deleteCard', 'updateCard', 'setCard', 'loadData']),
        async remove(id) {
            console.log(id)
            const { isConfirmed } = await Swal.fire({
                title: 'Esta Seguro?',
                text: 'Una vez borrado, no se puede recuperar',
                showDenyButton: true,
                confirmButtonText: 'Si, estoy seguro'
            });
            if (isConfirmed) {
                await this.deleteCard(id)
                await this.loadData()
            }
        },
        async edit() {
            await this.setCard(this.card)
            this.$modal.show('example')
        },
        async changeCardPanel(id) {
            let card = Object.assign(this.card)
            card.panel_id = id
            const selectedPanel = this.panels.find(panel => panel.id === id)
            if (selectedPanel.name === 'Done') {
                this.showPopUp = true
            }
            delete card.created_at
            delete card.updated_at
            await this.updateCard(card)
            await this.loadData()
        },
        verifyEndDate() {
            const date = Date.parse(this.card.end_date)
            const today = Date.now()
            if (date < today) {
                this.isLate = true
            }
        }
    }
}
</script>

<style lang="scss" scoped>

</style>