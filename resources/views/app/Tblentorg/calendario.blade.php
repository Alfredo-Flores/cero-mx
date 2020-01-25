@extends('layouts.emplayout')

@section('content')
    <div class="md-layout text-center">
        <div
            class="md-layout-item md-size-33 md-medium-size-50 md-small-size-70 md-xsmall-size-100"
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
            class="md-layout-item md-size-66 md-medium-size-50 md-small-size-70 md-xsmall-size-100"
        >
            <md-card class="md-card-calendar">
                <md-card-content>
                    <div id="calendar"></div>
                </md-card-content>
            </md-card>
        </div>
    </div>
@endsection

@push('scripts')
    <script>

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: [ 'dayGrid' ]
            });

            calendar.render();
        });

    </script>
@endpush
