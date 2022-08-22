<template>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Formulario de registro</div>

                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" v-model="form.name" placeholder="name" required>
                        </div>
                       <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" v-model="form.email" placeholder="name@example.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="inputPassword" v-model="form.password" required>
                        </div>
                         <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm Pass</label>
                            <input type="password" class="form-control" id="confirmPassword" v-model="confirmPassword" @keyup="validatePass" required>
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary" @click="toCard">Registrarse</button>
                            <span>Si ya tienes una cuenta inicia sesion <button type="button" class="btn btn-link" @click="toLoginForm">aqui</button></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                form: {
                    name: '', 
                    email: '',
                    password: ''
                },
                confirmPassword: ''
            }
        },
        methods: {
            toCard() {
                //this.$router.push({name: 'card'});
                console.log({message: 'listo para guardar', data: this.form});
                // this.$axios.post('')
            },
            toLoginForm() {
                this.$router.push({name: 'login'})
            },
            validatePass() {
                if (this.confirmPassword !== this.form.password) {
                    console.log('pass no match')
                    return
                } else {
                    console.log('great')
                }
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>