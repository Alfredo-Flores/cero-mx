@extends('layouts.app')

@section('content')
    <div class="md-layout">
        <div class="md-layout-item">
            <signup-card>
                <h3 class="title text-center mt-3" slot="title">Registro de usuario</h3>
                <div
                    class="md-layout-item md-size-50 md-medium-size-50 md-small-size-100 ml-auto"
                    slot="content-left"
                >
                    <div
                        class="info info-horizontal"
                        v-for="item in contentLeft"
                        :key="item.title"
                    >
                        <div :class="`icon ${item.colorIcon}`">
                            <md-icon>@{{ item.icon }}</md-icon>
                        </div>
                        <div class="description">
                            <h4 class="info-title">@{{ item.title }}</h4>
                            <p class="description">
                                @{{ item.description }}
                            </p>
                        </div>
                    </div>
                </div>
                <div
                    class="md-layout-item md-size-50 md-medium-size-50 md-small-size-100 mr-auto"
                    slot="content-right"
                >
                    <md-field class="md-form-group">
                        <md-icon>face</md-icon>
                        <label>Nombre</label>
                        <md-input v-model="nombre" type="text"></md-input>
                    </md-field>
                    <md-field class="md-form-group">
                        <md-icon>face</md-icon>
                        <label>Apellido Paterno</label>
                        <md-input v-model="apellidoprimero" type="text"></md-input>
                    </md-field>
                    <md-field class="md-form-group">
                        <md-icon>face</md-icon>
                        <label>Apellido materno</label>
                        <md-input v-model="apellidosegundo" type="text"></md-input>
                    </md-field>
                    <md-field class="md-form-group">
                        <md-icon>email</md-icon>
                        <label>Correo</label>
                        <md-input v-model="email" type="email"></md-input>
                    </md-field>
                    <md-field class="md-form-group">
                        <md-icon>lock_outline</md-icon>
                        <label>Contraseña</label>
                        <md-input v-model="password" type="password"></md-input>
                    </md-field>

                    <md-checkbox v-model="boolean"
                    >Acepto los <a href="#">terminos y condiciones</a>.</md-checkbox
                    >
                    <div class="button-container">
                        <md-button @click="register" class="md-success md-round mt-4" slot="footer"
                        >Registrarse</md-button
                        >
                    </div>
                </div>
            </signup-card>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        let mixLogin = {
            data() {
                return {
                    nombre: null,
                    apellidoprimero: "",
                    apellidosegundo: "",
                    email: null,
                    password: null,
                    boolean: false,
                    contentLeft: [
                        {
                            colorIcon: "icon-success",
                            icon: "timeline",
                            title: "Un buen comienzo",
                            description:
                                "Estas es tu oportunidad de aprender varias cosas sustentables."
                        },
                        {
                            colorIcon: "icon-success",
                            icon: "timeline",
                            title: "Una gran comunidad",
                            description:
                                "Somos una red de ecologistas y emprendurismo en busca de una mejor sostentabilidad en nuestras ciudades."
                        },
                    ]
                };
            },
            methods: {
                register() {

                    if (this.boolean == false) {
                        this.$toastr.Add({
                            title: "Acepte terminos y condiciones", // Toast Title
                            msg: "Es necesario que este de acuerdo con los terminos y condiciones", // Toast Message
                            type: "error", // Toast type,
                            preventDuplicates: true, //Default is false
                        });
                        return
                    }

                    let uri = "{{ route("register") }}";

                    axios.post(uri, {
                            Nombre: this.nombre,
                            ApellidoPrimero: this.apellidoprimero,
                            ApellidoSegundo: this.apellidosegundo,
                            email: this.email,
                            password: this.password,
                        }
                    ).then(response => {
                        if (response.data.success) {
                            this.$toastr.Add({
                                title: "Registrado Correctamente", // Toast Title
                                msg: response.data.message, // Toast Message
                                type: "success", // Toast type,
                                preventDuplicates: true, //Default is false,
                                onClosed: ()=>{
                                    window.location.replace("/");
                                },
                            });
                        } else {
                            this.$toastr.e(response.data.message, 'Error');
                        }
                    });
                }
            }
        };

        window.pageMix.push(mixLogin);
    </script>
@endpush
