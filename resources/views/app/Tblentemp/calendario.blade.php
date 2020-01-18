@extends('layouts.emplayout')

@section('content')
    <div class="md-layout text-center">
        <div
            class="md-layout-item md-size-45 md-medium-size-100"
        >
            <md-card>
                <md-card-header class="md-card-header-text md-card-header-primary">
                    <div class="card-text  md-elevation-5">
                        <h4 class="title">Ofertas interesadas</h4>
                        <p class="category">Información de la oferta y organización</p>
                    </div>
                </md-card-header>
                <md-card-content>
                    <md-table>
                        <md-table-row>
                            <md-table-head md-numeric>ID</md-table-head>
                            <md-table-head>Descripción</md-table-head>
                            <md-table-head>Organización</md-table-head>
                            <md-table-head>Acciones</md-table-head>
                        </md-table-row>

                        @foreach($ofertas as $key => $oferta)
                            <md-table-row slot="md-table-row">
                                <md-table-cell>{{ $key }}</md-table-cell>
                                <md-table-cell>{{ $oferta["Dscentdnc"] }}</md-table-cell>
                                <md-table-cell>Doña francis</md-table-cell>
                                <md-table-cell>
                                    <md-button class="md-just-icon md-primary" id="{{ $key }}" @click="abrirModalAceptar">
                                        <md-icon>done</md-icon>
                                    </md-button>
                                    <md-button class="md-just-icon md-danger" id="{{ $key }}">
                                        <md-icon>close</md-icon>
                                    </md-button>
                                </md-table-cell>
                            </md-table-row>
                        @endforeach

                    </md-table>
                </md-card-content>
            </md-card>
        </div>

        <div
            class="md-layout-item md-size-55 md-medium-size-100"
        >
            <md-card class="md-card-calendar">
                <md-card-content>
                    <div id="calendar"></div>
                </md-card-content>
            </md-card>
        </div>
    </div>

    <modal v-if="modalaceptar" @close="cerrarModalAceptar" style="z-index: 2">
        <template slot="header">
            <h4 class="modal-title">Registro de rutina</h4>
            <md-button
                class="md-simple md-just-icon md-round modal-default-button"
                @click="cerrarModalAceptar"
            >
                <md-icon>clear</md-icon>
            </md-button>
        </template>

        <template slot="body">
            <h3>Los campos con * son obligatorios</h3>
            <md-field>
                <md-icon>info</md-icon>
                <label for="rutina">Rutina</label>
                <p style="color: red">*</p>
                <md-select v-model="rutina" name="rutina" ref="rutina">
                    <md-option value="1">Mensual</md-option>
                    <md-option value="2">Quincenal</md-option>
                    <md-option value="3">Semanal</md-option>
                    <md-option value="4">Diario</md-option>
                    <md-option value="5">Unico</md-option>
                </md-select>
            </md-field>
            <md-field>
                <md-icon>info</md-icon>
                <label for="rutina">Horario</label>
                <p style="color: red">*</p>
                <md-select v-model="horario" class="ml-1" >
                    <md-option value="0:00">0:00 AM</md-option>
                    <md-option value="1:00">1:00 AM</md-option>
                    <md-option value="2:00">2:00 AM</md-option>
                    <md-option value="3:00">3:00 AM</md-option>
                    <md-option value="4:00">4:00 AM</md-option>
                    <md-option value="5:00">5:00 AM</md-option>
                    <md-option value="6:00">6:00 AM</md-option>
                    <md-option value="7:00">7:00 AM</md-option>
                    <md-option value="8:00">8:00 AM</md-option>
                    <md-option value="9:00">9:00 AM</md-option>
                    <md-option value="10:00">10:00 AM</md-option>
                    <md-option value="11:00">11:00 AM</md-option>
                    <md-option value="12:00">12:00 AM</md-option>
                    <md-option value="13:00">1:00 PM</md-option>
                    <md-option value="14:00">2:00 PM</md-option>
                    <md-option value="15:00">3:00 PM</md-option>
                    <md-option value="16:00">4:00 PM</md-option>
                    <md-option value="17:00">5:00 PM</md-option>
                    <md-option value="18:00">6:00 PM</md-option>
                    <md-option value="19:00">7:00 PM</md-option>
                    <md-option value="20:00">8:00 PM</md-option>
                    <md-option value="21:00">9:00 PM</md-option>
                    <md-option value="22:00">10:00 PM</md-option>
                    <md-option value="23:00">11:00 PM</md-option>
                </md-select>
            </md-field>

            <md-field>
                <md-icon>info</md-icon>
                <label for="rutina">Detalles de entrega</label>
                <p style="color: red">*</p>
                <md-input v-model="detalles"></md-input>
            </md-field>
        </template>

        <template slot="footer">
            <md-button
                class="md-danger md-simple"
                @click="cerrarModalAceptar"
            >Cancelar</md-button
            >
            <md-button
                class="md-danger md-simple"
                onclick="agregarEvento"
            >Aceptar</md-button
            >
        </template>
    </modal>
@endsection

@push('scripts')
    <script>

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: [ 'dayGrid' ],
                locale: 'es',
                hiddenDays: [ 0, 6 ],
                events: [
                    {
                        id: 'a',
                        title: 'my event',
                        start: '2020-01-02'
                    }
                ],
                eventClick: function(info) {

                    alert('Id: ' + info.event.id);

                }
            });

            calendar.render();
        });

        let mixLogin = {
            data() {
                return {
                    modalaceptar: "",
                    rutina: "",
                    horario: "",
                    detalles: "",
                };
            },
            methods: {
                abrirModalAceptar() {
                    this.modalaceptar = true;
                },
                cerrarModalAceptar() {
                    this.modalaceptar = false;
                },
                agregarEvento() {

                }
            }
        };

        window.pageMix.push(mixLogin);

    </script>
@endpush
