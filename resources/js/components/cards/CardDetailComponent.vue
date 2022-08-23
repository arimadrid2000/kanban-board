<template>
    <div>
         <div class="card p-2">
            <h5 class="card-title">
                {{ card.name }}
            </h5>
            <div class="btn-group btn-group-sm" role="group" aria-label="...">
                <button type="button" class="btn btn-danger" @click="remove(card.id)">Eliminar</button>
                <div class="btn-group btn-group-sm" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Mover
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <li v-for="item in panels" :key="item.id"><a class="dropdown-item" href="#">{{ item.name }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions, mapState } from 'vuex'
import Swal from 'sweetalert2'

    export default {
        props: {
            card: {
                type: Object,
                default: null
            },
        },
        computed: {
           ...mapState('panel', ['panels'])
        },
        methods: {
            ...mapActions('panel', ['deleteCard']),
            async remove(id) {
                console.log(id)
                const { isConfirmed } = await Swal.fire({
                    title: 'Esta Seguro?',
                    text: 'Una vez borrado, no se puede recuperar',
                    showDenyButton: true,
                    confirmButtonText: 'Si, estoy seguro'
                })
                if (isConfirmed) {
                    const resp = await this.deleteCard(id)
                    console.log(resp)
                }
            },
            edit() {
                this.$modal.show('example')
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>