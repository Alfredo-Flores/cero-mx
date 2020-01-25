@extends('layouts.emplayout')

@section('content')
    <div class="md-layout text-center">
        <div
            class="md-layout-item md-size-50 md-medium-size-100"
        >
            <md-card>
                <md-card-header class="md-card-header-text md-card-header-primary">
                    <div class="card-text">
                        <h4 class="title">Employees Stats</h4>
                        <p class="category">New employees on 15th September, 2016</p>
                    </div>
                </md-card-header>
                <md-card-content>
                    Hello
                </md-card-content>
            </md-card>
        </div>
        <div
            class="md-layout-item md-size-50 md-medium-size-100"
        >
            <md-card>
                <md-card-header class="md-card-header-text md-card-header-warning">
                    <div class="card-text">
                        <h4 class="title">Ofertas disponibles</h4>
                    </div>
                </md-card-header>
                <md-card-content>
                    Hello
                </md-card-content>
            </md-card>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        let mixLogin = {
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
                    let uri = '{{ route('login') }}';

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
        };

        window.pageMix.push(mixLogin);
    </script>
@endpush
