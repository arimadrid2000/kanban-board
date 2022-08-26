<template>
    <div>
         <div class="card p-2">
            <h5 class="card-title">
                {{ card.name }}
            </h5>
           <select class="form-select" aria-label="panels select" @change="changeCardPanel">
                <option selected>Mover</option>
                <option v-for="item in panels" :key="item.id" :value="item.id">{{ item.name }}</option>
            </select>
            <div class="btn-group btn-group-sm" role="group" aria-label="...">
                <button type="button" class="btn btn-danger" @click="remove(card.id)">Eliminar</button>
                <button type="button" class="btn btn-success" @click="edit(card.id)">Editar</button>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions, mapState } from 'vuex';
import Swal from 'sweetalert2';

export default {
    data() {
        return {
            user: JSON.parse(localStorage.getItem('user'))
        }
    },
    props: {
        card: {
            type: Object,
            default: null
        }
    },
    computed: {
        ...mapState('panel', ['panels'])
    },
    methods: {
        ...mapActions('panel', ['deleteCard', 'updateCard', 'setCard']),
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
                location.reload()
            }
        },
        async edit() {
            await this.setCard(this.card)
            this.$modal.show('example')
        },
        async changeCardPanel($event) {
            let card = Object.assign(this.card)
            card.panel_id = $event.target.value
            delete card.created_at
            delete card.updated_at
            const resp = await this.updateCard(card)
            location.reload()
        }
    }
}
</script>

<style lang="scss" scoped>

</style>