<template>
    <div class="md-layout text-center">
        <div
            class="md-layout-item md-size-33 md-medium-size-50 md-small-size-70 md-xsmall-size-100"
        >
            <login-card header-color="green">
                <h4 slot="title" class="title">{{ __("login.title") }}</h4>
                <md-field class="md-form-group" slot="inputs">
                    <md-icon>email</md-icon>
                    <label>{{ __("login.email") }}</label>
                    <md-input v-model="email" type="email"></md-input>
                </md-field>
                <md-field class="md-form-group" slot="inputs">
                    <md-icon>lock_outline</md-icon>
                    <label>{{ __("login.password") }}</label>
                    <md-input v-model="password" type="password"></md-input>
                </md-field>
                <md-button slot="footer" @click="login" class="md-simple md-success md-lg">
                    {{ __("login.login") }}
                </md-button>
            </login-card>
        </div>
    </div>
</template>

<script>
    export default {
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
                let uri = '/Users/submit/login';

                axios.post(uri, {
                    email: this.email,
                    password: this.password
                }).then(response => {
                    console.log(response)
                    if (response.data) {
                        window.location.replace("/");
                    } else {
                        this.$toastr.Add({
                            title: "No existe el usuario", // Toast Title
                            msg: "Porfavor corrija sus credenciales", // Toast Message
                            type: "error", // Toast type,
                        });
                    }
                });
            },
        },
    }
</script>

