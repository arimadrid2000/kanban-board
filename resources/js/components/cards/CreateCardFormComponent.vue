<template>
    <div class="container mt-3">
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
import { mapActions } from 'vuex'
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
                }
            }
        },
        methods: {
            ...mapActions('panel', ['createCard']),
            async addCard() {
                const { id } = this.user
                this.form.panel_id = this.panelId
                this.form.user_id = id
                const data = await this.createCard(this.form)
                console.log(data)
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>