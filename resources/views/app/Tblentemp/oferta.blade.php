@extends('layouts.emplayout')

@section('content')
    <div class="md-layout text-center">
        <div
            class="md-layout-item md-size-30 md-medium-size-100"
        >
            <md-card>
                <md-card-header class="md-card-header-text md-card-header-primary">
                    <div class="card-text">
                        <h4 class="title">Nueva oferta</h4>
                        <p class="category">Publique una nueva oferta para su ciudad</p>
                    </div>
                </md-card-header>
                <md-card-content>
                    <md-field>
                        <label>Titulo / ¿Qué es?</label>
                        <md-input v-model="descripcion"></md-input>
                        <span class="md-helper-text">Sea lo mas breve posible</span>
                    </md-field>
                    <md-field>
                        <label for="tipo">Tipo de alimento</label>
                        <md-select v-model="tipo" name="tipo" ref="tipo">
                            <md-option value="Fruta">Fruta</md-option>
                            <md-option value="Verdura">Verdura</md-option>
                            <md-option value="Carnes/Lacteos">Carnes/Lacteos</md-option>
                            <md-option value="Harina">Harina</md-option>
                            <md-option value="Abarrotes">Abarrotes</md-option>
                        </md-select>
                    </md-field>
                    <md-field>
                        <label>Peso en kilogramos</label>
                        <md-input v-model="kilogramos" type="numeric"></md-input>
                    </md-field>
                    <md-field>
                        <label>Cajas/Rejillas aproximadas</label>
                        <md-input v-model="cajas" type="numeric"></md-input>
                    </md-field>
                    <md-datepicker v-model="tiempo" md-immediately :md-disabled-dates="disabledDates">
                        <label>Tiempo restante para consumo</label>
                    </md-datepicker>
                    <md-button class="md-raised md-primary" @click="crearOferta">Ofertar</md-button>

                </md-card-content>
            </md-card>
        </div>
        <div
            class="md-layout-item md-size-70 md-medium-size-100"
        >
            <md-card>
                <md-card-header class="md-card-header-text md-card-header-warning">
                    <div class="card-text">
                        <h4 class="title">Ofertas publicadas</h4>
                    </div>
                </md-card-header>
                <md-card-content>
                    <md-table>
                        <md-table-row>
                            <md-table-head md-numeric>ID</md-table-head>
                            <md-table-head>Descripción</md-table-head>
                            <md-table-head>Tipo</md-table-head>
                            <md-table-head>Peso</md-table-head>
                            <md-table-head>Job Cajas</md-table-head>
                            <md-table-head>Tiempo restante</md-table-head>
                            <md-table-head>Acciones</md-table-head>
                        </md-table-row>

                        @foreach ($ofertas as $key => $oferta)
                        <md-table-row slot="md-table-row">
                            <md-table-cell>{{ $key }}</md-table-cell>
                            <md-table-cell>{{ $oferta["Dscentdnc"] }}</md-table-cell>
                            <md-table-cell>{{ $oferta["Tipentdnc"] }}</md-table-cell>
                            <md-table-cell>{{ $oferta["Kgsentdnc"] }} Kg.</md-table-cell>
                            <md-table-cell>{{ $oferta["Cntcjsdnc"] }} cajas</md-table-cell>
                            <md-table-cell>{{ $oferta["Tmprstdnc"] }} días</md-table-cell>
                            @if($oferta["Rqsentdnc"])
                            <md-table-cell>
                                <md-button class="md-just-icon md-dense md-raised md-warning" ref="1" @click="modificar"><md-icon>edit</md-icon></md-button>
                                <md-button class="md-just-icon md-dense md-raised md-danger" ref="1"><md-icon>close</md-icon></md-button>
                            </md-table-cell>
                            @else
                                <md-table-cell>
                                    <md-button class="md-just-icon md-dense md-raised md-success" ref="1" @click="modificar"><md-icon>notification_important</md-icon></md-button>
                                </md-table-cell>
                            @endif
                        </md-table-row>
                        @endforeach
                    </md-table>

                </md-card-content>
            </md-card>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        let mixLogin = {
            data() {
                let now = new Date();

                return {
                    descripcion: "",
                    tipo: "",
                    kilogramos: "",
                    cajas: "",
                    tiempo: Number(now),
                    disabledDates: date => {
                        const day = date.getDay()

                        return day === 6 || day === 0
                    },
                    ofertas: [],
                };
            },
            methods: {
                modificar(id) {

                    console.log(id);
                    console.log(this.$refs.descripcion.innerHTML);

                    this.descripcion = this.$refs.descripcion;
                    this.tipo = this.$refs.tipo;
                    this.kilogramos = document.getElementById('kilogramos_' + id);
                    this.cajas = document.getElementById('cajas_' + id);
                    this.tiempo = document.getElementById('tiempo_' + id);
                },
                crearOferta() {
                    let uri = '{{ route('Tblentdnc.submit') }}';

                    tiempomysql = new Date(this.tiempo).toISOString().slice(0, 19).replace('T', ' ');

                    axios.post(uri, {
                        Descripcion: this.descripcion,
                        TipoAlimento: this.tipo,
                        Kilogramos: this.kilogramos,
                        CantCajas: this.cajas,
                        TiempoRestante: tiempomysql
                    }).then(response => {
                        if (response.data.success) {
                            this.$toastr.Add({
                                title: "Se ha subido correctamente la oferta", // Toast Title
                                msg: response.data.message, // Toast Message
                                type: "success", // Toast type,
                            });

                            window.location.reload();
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
