<template>
    <div class="md-layout text-center">
        <div
            class="md-layout-item md-size-33 md-medium-size-50 md-small-size-70 md-xsmall-size-100"
        >
            <login-card header-color="green">
                <h4 slot="title" class="title">Iniciar sesión</h4>
                <md-field class="md-form-group" slot="inputs">
                    <md-icon>email</md-icon>
                    <label>Correo Electronico</label>
                    <md-input v-model="email" type="email"></md-input>
                </md-field>
                <md-field class="md-form-group" slot="inputs">
                    <md-icon>lock_outline</md-icon>
                    <label>Contraseña</label>
                    <md-input v-model="password" type="password"></md-input>
                </md-field>
                <md-button slot="footer" @click="login" class="md-simple md-success md-lg">
                    Iniciar sesión
                </md-button>
            </login-card>
        </div>
    </div>
</template>

<script>
    import LoginCard from "../../components/Cards/LoginCard.vue";

    export default {
        components: {
            LoginCard
        },
        data() {
            return {
                firstname: null,
                email: null,
                password: null,
                remember: null,
                showMenu: false,
                menuTransitionDuration: 250,
                pageTransitionDuration: 300,
                year: new Date().getFullYear()
            };
        },
        methods: {
            login() {
                var app = this;

                console.log(this.$auth.check());
                this.$auth.login({
                    params: {
                        email: app.email,
                        password: app.password
                    },
                    success: function () {
                        console.log("yes");

                    },
                    error: function () {
                        console.log("nope");
                    },
                    rememberMe: true,
                    redirect: '/',
                    fetchUser: true,
                });
            },
        },
    }
</script>

