<template>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Inicio de sesion</div>

                    <div class="card-body">
                       <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="name@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="inputPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="inputPassword">
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary" @click="toCard">Iniciar Sesion</button>
                            <span>Si aun no tienes cuenta <button type="button" class="btn btn-link" @click="toRegisterForm">Registrate</button></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        methods: {
            toCard() {
                this.$router.push({name: 'card'});
            },
            toRegisterForm() {
                this.$router.push({name: 'register'});
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>