<template>

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

