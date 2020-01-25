@extends('layouts.orglayout')

@section('content')
    <div class="md-layout text-center">
        <div
            class="md-layout-item md-size-100"
        >
            <md-card>
                <md-card-header class="md-card-header-text md-card-header-warning">
                    <div class="card-text">
                        <h4 class="title">Ofertas disponibles</h4>
                    </div>
                </md-card-header>
                <md-card-content>


                    @foreach ($ofertas as $key => $oferta)
                            <div>
                                <md-card style="background-color: rgba(0,0,0,0.11) ">
                                    <md-card-content>
                                        <div class="md-layout ">
                                            <div
                                                class="md-layout-item md-size-30 text-center"
                                            >
                                                <p>Contenido: <span style="color: red;" ref="descripcion">{{ $oferta["Dscentdnc"] }}</span></p>
                                                <p>Tipo de contenido: <span style="color: red;" ref="tipo">{{ $oferta["Tipentdnc"] }}</span></p>
                                                <p>Organización: <span style="color: red;" ref="tipo">{{ $oferta["Namentemp"] }}</span></p>
                                            </div>
                                            <div
                                                class="md-layout-item md-size-35 text-center"
                                            >
                                                <p>Peso: <span style="color: red;" ref="kilogramos">{{ $oferta["Kgsentdnc"] }} Kg.</span></p>
                                                <p>Cajas: <span style="color: red;" ref="cajas">{{ $oferta["Cntcjsdnc"] }} cajas</span></p>
                                                <p>Tiempo restante de consumo: <span style="color: red;" ref="tiempo">{{ $oferta["Tmprstdnc"] }} días</span></p>
                                            </div>
                                            <div
                                                class="md-layout-item md-size-35"
                                            >
                                                <md-button class="md-dense md-raised md-primary" ref="{{ $key }}" @click="verOferta('{{ $oferta["Uuid"] }}')">Solicitar</md-button>
                                            </div>
                                        </div>
                                    </md-card-content>
                                </md-card>
                            </div>
                    @endforeach
                    @if($ofertas == false)
                            <div>
                                <md-card style="background-color: rgba(0,0,0,0.11) ">
                                    <md-card-content>
                                        <h4>Parece que no hay ofertas, intente en otro momento</h4>
                                    </md-card-content>
                                </md-card>
                            </div>
                        @endif
                </md-card-content>
            </md-card>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        let mixLogin = {
            methods: {
                verOferta(uuid) {
                    let uri = '{{ route('Tblentdnc.request') }}';

                    axios.post(uri, {
                        Uuid: uuid,
                    }).then(response => {
                        if (response.data.success) {
                            Swal.fire({
                                title: '¿Quieres solicitar esta oferta?',
                                text: "Se le notificara a la empresa " + response.data.nombre + " en " + response.data.entidad
                                + ", " + response.data.municipio + ". Con dirección: " + response.data.localidad,
                                icon: 'info',
                                showCancelButton: true,
                                confirmButtonText: 'Solicitar',
                                cancelButtonText: 'No'
                            }).then((result) => {
                                if (result.value) {
                                    let uri = '{{ route('Tblentdnc.finish') }}';


                                    axios.post(uri, {
                                        Uuid: uuid,
                                    }).then(response => {
                                        if (response.data.success) {
                                            Swal.fire({
                                                title: "Solicitado",
                                                text: response.data.message,
                                                icon: 'success',
                                                confirmButtonText: 'Entendido',
                                            }).then(() => {
                                                window.location.reload();
                                            }
                                        );
                                        } else {
                                            this.$toastr.Add({
                                                title: "Ocurrio un error", // Toast Title
                                                msg: response.data.message, // Toast Message
                                                type: "error", // Toast type,
                                            });
                                        }
                                    });
                                }
                            });

                        } else {
                            this.$toastr.Add({
                                title: "Ocurrio un error", // Toast Title
                                msg: response.data.message, // Toast Message
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
