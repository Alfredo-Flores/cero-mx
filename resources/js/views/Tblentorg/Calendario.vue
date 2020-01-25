<template>
    <div class="md-layout">
        <div class="md-layout-item md-size-40 mx-auto">
            <md-card>
                <md-card-header class="md-card-header-text md-card-header-primary">
                    <div class="card-text">
                        <h4 class="title">Información</h4>
                    </div>
                </md-card-header>
                <md-card-content>
                    <p>Haz click en los eventos que las empresas te hayan asignado, si existe alguna inconformidad, </p>
                </md-card-content>
            </md-card>
        </div>
        <div class="md-layout-item md-size-60 mx-auto">
            <md-card class="md-card-calendar">
                <md-card-content>
                    <fullCalendar
                        ref="calendar"
                        defaultView="dayGridMonth"
                        locale="esLocale"
                        :plugins="calendarPlugins"
                        :events="events"
                        @eventClick="verEvento"
                        :header="header"
                        :buttonIcons="buttonIcons"
                        :editable="true"
                        :weekends="false"
                        :valid-range="function(nowDate) {
                            return {
                              start: nowDate
                            };
                          }"
                    />
                </md-card-content>
            </md-card>
        </div>

        <modal v-if="infobandera" @close="cerrarModalInfo" style="z-index: 3">
            <template slot="header">
                <div class="m-4">
                    <h4 class="modal-title">Información</h4>
                    <md-button
                        class="md-simple md-just-icon md-round modal-default-button"
                        @click="cerrarModalInfo"
                    >
                        <md-icon>clear</md-icon>
                    </md-button>
                </div>
            </template>

            <template slot="body">
                <p>Nombre de la empresa: {{ ofertatemporal.Namentemp }}</p>

                <p>Domicilio de la empresa: {{ ofertatemporal.Drcentemp }}</p>

                <p>Localidad de la empresa: {{ ofertatemporal.Lclentemp }}</p>

                <p>Telefono de la empresa: {{ ofertatemporal.Tlfofiemp }}</p>

                <p>Localidad de la empresa: {{ ofertatemporal.Emlofiemp }}</p>

                <p>Oferta: {{ ofertatemporal.Dscentdnc }}</p>

                <p>Tipo de alimento: {{ ofertatemporal.Tipentdnc }}</p>

                <p>Kilos: {{ ofertatemporal.Kgsentdnc }}</p>

                <p>Cajas: {{ ofertatemporal.Cntcjsdnc }}</p>

                <p>Horario: 7:00 am</p>

            </template>

            <template slot="footer">
                <md-button class="md-simple m-2" @click="cerrarModalInfo">Cerrar</md-button>
            </template>
        </modal>


    </div>
</template>

<script>

    import FullCalendar from "@fullcalendar/vue";
    import dayGridPlugin from "@fullcalendar/daygrid";
    import interactionPlugin from "@fullcalendar/interaction";
    import timeGridPlugin from "@fullcalendar/timegrid";
    import esLocale from '@fullcalendar/core/locales/es';
    import Swal from "sweetalert2";
    import Modal from "../../components/Modal.vue";


    var today = new Date();
    var y = today.getFullYear();
    var m = today.getMonth();
    var d = today.getDate();

    export default {
        components: {
            FullCalendar,
            Modal
        },
        data() {
            return {
                locale: esLocale,
                calendarPlugins: [dayGridPlugin, interactionPlugin, timeGridPlugin],
                header: {
                    right: "prev,next"
                },
                buttonIcons: {
                    close: "fa-times",
                    prev: "left-single-arrow",
                    next: "right-single-arrow",
                },

                infobandera: false,
                dia: null,
                fechainicial: null,
                periodicidad: null,
                horario: null,
                infotemporal: null,
                events: []
            };
        },
        methods: {
            verEvento(info) {

                let uuid = info.event.extendedProps.uuid;

                for (let i = 0; i < this.ofertastemporales.length; i++) {
                    if (this.ofertastemporales[i]["Uuid"] == uuid) {
                        this.ofertatemporal = this.ofertastemporales[i];
                    }
                }

                for (let i = 0; i < this.eventostemporales.length; i++) {
                    if (this.eventostemporales[i]["Uuid"] == uuid) {
                        this.eventotemporal = this.eventostemporales[i];
                    }
                }

                this.periodicidad = this.eventotemporal.Prdentcln;
                const days = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', ];
                let d = new Date(this.eventotemporal.Fchinccln);
                this.fechainicial = d;
                this.dia = days[d.getDay()];
                this.infotemporal = info;

                this.abrirModalInfo();
            },
            refrescarCalendario(){
                if (this.$auth.ready()) {
                    let uri = 'Tblentcln/fetch';

                    axios.post(uri, {
                        Id: this.$auth.user().Id,
                    }).then(response => {
                        if (response.data.success) {
                            this.events = response.data.data;
                            this.ofertastemporales = response.data.ofertas;
                            this.eventostemporales = response.data.eventos;
                        } else {
                            this.events = null;
                        }
                    });
                }
            },
            abrirModalInfo() {
                this.infobandera = true;
            },
            cerrarModalInfo() {
                this.infobandera = false;
            }
        },
        created() {
            this.refrescarCalendario();
        },
    };
</script>
<style lang="scss" scoped>
    #fullCalendar {
        min-height: 300px;
    }

    .md-card-calendar {
        .md-card-content {
            padding: 0 !important;
        }
    }

    .text-center {
        text-align: center;
    }
</style>
