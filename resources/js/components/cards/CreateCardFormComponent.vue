<template>
    <div class="container mt-3" v-show="showModal">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3>Crear tarjeta</h3>
                <form action="#" @submit.prevent="addCard">
                <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" v-model="form.name" id="name" placeholder="nombre de la tarjeta">
                    </div>
                    <div class="mb-3">
                        <label for="end_date" class="form-label">Fecha de fin</label>
                        <input type="date" v-model="form.end_date" class="form-control" id="end_date">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions, mapState } from 'vuex'
    export default {
        props: {
            panelId: {
                type: Number,
                default: null
            }
        },
        data() {
            return {
                user: JSON.parse(localStorage.getItem('user')),
                form: {
                    name: '',
                    end_date: '',
                    panel_id: null,
                    user_id: null
                },
                showModal: true
            }
        },
        computed: {
            ...mapState('panel', ['editableCard'])
        },
        created () {
            if (this.editableCard !== null) {
                this.form = this.editableCard
            }
        },
        methods: {
            ...mapActions('panel', ['createCard', 'updateCard', 'setCard', 'loadData']),
            async addCard() {
                if (this.editableCard === null) {
                    const { id } = this.user
                    this.form.panel_id = this.panelId
                    this.form.user_id = id
                    await this.createCard(this.form)
                } else {
                    await this.updateCard(this.form)
                    await this.setCard(null)
                }
                await this.loadData()
                this.$modal.hide('example')
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>