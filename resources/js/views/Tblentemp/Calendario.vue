<template>
    <div class="md-layout">
        <div class="md-layout-item md-size-40 md-medium-size-100 mx-auto">
            <md-card>
                <md-card-header class="md-card-header-text md-card-header-primary">
                    <div class="card-text">
                        <h4 class="title">Ofertas Solicitadas</h4>
                    </div>
                </md-card-header>
                <md-card-content>
                    <div v-if="ofertas == null">
                        <h4 class="title">Parece que esta vacio!</h4>
                    </div>
                    <div v-else>
                        <md-table>
                            <md-table-row>
                                <md-table-head>Organización</md-table-head>
                                <md-table-head>Oferta</md-table-head>
                                <md-table-head>Acciones</md-table-head>
                            </md-table-row>
                            <md-table-row v-for="(oferta, i) in ofertas" :key="i">
                                <md-table-cell>{{ oferta.Nmbentorg }}</md-table-cell>
                                <md-table-cell>{{ oferta.Dscentdnc }}</md-table-cell>
                                <md-table-cell>
                                    <md-button
                                        class="md-just-icon md-danger"
                                        @click="rechazarOrganizacion(oferta)"
                                    >
                                        <md-icon>close</md-icon>
                                    </md-button
                                    >
                                    <md-button
                                        class="md-just-icon md-primary"
                                        @click="aceptarOrganizacion(oferta)"
                                    >
                                        <md-icon>done</md-icon>
                                    </md-button
                                    >
                                    <md-button
                                        class="md-just-icon md-info"
                                        @click="informacionOrganizacion(oferta)"
                                    >
                                        <md-icon>info</md-icon>
                                    </md-button
                                    >
                                </md-table-cell>
                            </md-table-row>
                        </md-table>
                    </div>
                </md-card-content>
            </md-card>
        </div>
        <div class="md-layout-item md-size-60 md-medium-size-100 mx-auto">
            <md-card class="md-card-calendar">
                <md-card-content>
                    <fullCalendar
                        ref="calendar"
                        defaultView="dayGridMonth"
                        locale="esLocale"
                        :plugins="calendarPlugins"
                        :events="events"
                        @dateClick="modalCalendarizarOrganizacion"
                        @eventClick="modificarEvento"
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


        <modal v-if="seleccionbandera" @close="cerrarModalSeleccionar" style="z-index: 3">
            <template slot="header">
                <div class="m-4">
                    <h4 class="modal-title">Calendarización</h4>
                    <md-button
                        class="md-simple md-just-icon md-round modal-default-button"
                        @click="cerrarModalSeleccionar"
                    >
                        <md-icon>clear</md-icon>
                    </md-button>
                </div>
            </template>

            <template slot="body">
                <p>Nombre de la organización: {{ ofertatemporal.Nmbentorg }}</p>

                <p>Oferta interesada: {{ ofertatemporal.Dscentdnc }}</p>

                <p>Día selecciónado: {{ dia }}</p>

                <md-field style="z-index: 4">
                    <label>Periodicidad de entrega</label>
                    <md-select v-model="periodicidad" name="periodicidad" id="periodicidad">
                        <md-option value="1">Mensual</md-option>
                        <md-option value="2">Quincenal</md-option>
                        <md-option value="3">Semanal</md-option>
                        <md-option value="4">Diario</md-option>
                        <md-option value="5">Unico</md-option>
                    </md-select>
                </md-field>
                <md-field>
                    <label>Horario de entrega de alimentos</label>
                    <md-select v-model="hora">
                        <md-option value="5">5:00 AM</md-option>
                        <md-option value="6">6:00 AM</md-option>
                        <md-option value="7">7:00 AM</md-option>
                        <md-option value="8">8:00 AM</md-option>
                        <md-option value="9">9:00 AM</md-option>
                        <md-option value="10">10:00 AM</md-option>
                        <md-option value="11">11:00 AM</md-option>
                        <md-option value="12">12:00 AM</md-option>
                        <md-option value="13">1:00 PM</md-option>
                        <md-option value="14">2:00 PM</md-option>
                        <md-option value="15">3:00 PM</md-option>
                        <md-option value="16">4:00 PM</md-option>
                        <md-option value="17">5:00 PM</md-option>
                        <md-option value="18">6:00 PM</md-option>
                        <md-option value="19">7:00 PM</md-option>
                        <md-option value="20">8:00 PM</md-option>
                        <md-option value="21">9:00 PM</md-option>
                        <md-option value="22">10:00 PM</md-option>
                        <md-option value="23">11:00 PM</md-option>
                        <md-option value="0">0:00 AM</md-option>
                        <md-option value="1">1:00 AM</md-option>
                        <md-option value="2">2:00 AM</md-option>
                        <md-option value="3">3:00 AM</md-option>
                        <md-option value="4">4:00 AM</md-option>
                    </md-select>
                </md-field>
                <md-datepicker v-model="fechafinal" md-immediately :md-disabled-dates="disabledDates" v-if="periodicidad != 5">
                    <label>Fecha limite para rutina</label>
                </md-datepicker>
            </template>

            <template slot="footer">

                <div v-if="modificarbandera">
                    <md-button class="md-simple m-2" @click="cerrarModalSeleccionar">Cancelar</md-button>
                    <md-button
                        class="md-danger m-2"
                        @click="eliminarOrganizacion"
                    >Eliminar
                    </md-button
                    >
                    <md-button
                        class="md-warning m-2"
                        @click="modificarOrganizacion"
                    >Modificar
                    </md-button
                    >
                </div>

                <div v-else>
                    <md-button class="md-simple m-2" @click="cerrarModalSeleccionar">Cancelar</md-button>
                    <md-button
                        class="md-success m-2"
                        @click="calendarizarOrganizacion"
                    >Calendarizar
                    </md-button
                    >
                </div>

            </template>
        </modal>


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
                <p>Nombre de la organización: {{ ofertatemporal.Nmbentorg }}</p>

                <p>Domicilio de la organización: {{ ofertatemporal.Dmcentorg }}</p>

                <p>Localidad de la organización: {{ ofertatemporal.Lclentorg }}</p>

                <p>Telefono de la organización: {{ ofertatemporal.Tlffcnorg }}</p>

                <p>Localidad de la organización: {{ ofertatemporal.Emlfcnorg }}</p>

                <p>Oferta interesada: {{ ofertatemporal.Dscentdnc }}</p>

                <p>Tipo de alimento: {{ ofertatemporal.Tipentdnc }}</p>

                <p>Kilos: {{ ofertatemporal.Kgsentdnc }}</p>

                <p>Cajas: {{ ofertatemporal.Cntcjsdnc }}</p>

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
                disabledDates: date => {
                    const today = new Date();
                    const day = date.getDay();

                    return day === 6 || day === 0 || date <= today
                },
                ofertas: null,
                ofertastemporales: null,
                eventostemporales: null,
                ofertatemporal: null,
                eventotemporal: null,
                infotemporal: null,
                ofertasubida: null,
                seleccionbandera: false,
                modificarbandera: false,
                infobandera: false,
                dia: null,
                fechainicial: null,
                fechafinal: null,
                periodicidad: null,
                hora: 0,
                events: []
            };
        },
        methods: {
            rechazarOrganizacion(oferta) {
                Swal.fire({
                    title: '¿Seguro que quieres rechazar a esta organización?',
                    text: "Quizas podrias contactarles y quedar de acuerdo en algo",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Rechazar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.value) {

                        let uri = "Tblentdnc/refuse";

                        axios.post(uri, {
                            Uuid: oferta.Uuid,
                        }).then(response => {
                            if (response.data.success) {
                                this.$toastr.Add({
                                    title: "Correcto", // Toast Title
                                    msg: response.data.message, // Toast Message
                                    type: "success", // Toast type,
                                });

                                this.refrescarTabla();
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
            },
            aceptarOrganizacion(oferta) {
                this.modificarbandera = false;
                Swal.fire({
                    title: '¿Seguro que quieres aceptar a esta organización?',
                    text: "Se te preguntara en que fecha calendarizar su rutina, se recomienda contactar a la organización posteriormente",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Aceptar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.value) {
                        this.ofertatemporal = oferta;

                        this.$toastr.Add({
                            title: "Correcto", // Toast Title
                            msg: "¡Elija algun día para su rutina dentro del calendario!", // Toast Message
                            type: "success", // Toast type,
                        });
                    }
                });
            },
            informacionOrganizacion(oferta) {
                this.ofertatemporal = oferta;
                this.abrirModalInfo();
            },
            modalCalendarizarOrganizacion(info) {
                if (this.ofertatemporal != null && this.ofertatemporal !== this.ofertasubida) {
                    const days = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'];
                    let d = new Date(info.dateStr);
                    this.fechainicial = d;
                    this.dia = days[d.getDay()];

                    this.disabledDates = date => {
                        const today = d;
                        const day = date.getDay();

                        return day === 6 || day === 0 || date <= today
                    };

                    this.abrirModalSeleccionar();
                } else {
                    this.$toastr.Add({
                        title: "Error", // Toast Title
                        msg: "Por favor, seleccione una oferta de la lista para calendarizar", // Toast Message
                        type: "error", // Toast type,
                    });
                }
            },
            calendarizarOrganizacion() {
                if (this.hora == null){
                    this.$toastr.Add({
                        title: "Ocurrio un error", // Toast Title
                        msg: "Por favor, escoja una hora ", // Toast Message
                        type: "error", // Toast type,
                    });
                } else if (this.fechainicial == null){
                    this.$toastr.Add({
                        title: "Ocurrio un error", // Toast Title
                        msg: "Recarge la pagina por favor", // Toast Message
                        type: "error", // Toast type,
                    });
                } else {
                    Swal.fire({
                        title: '¿Confirmar Rutina?',
                        text: "Despues puede modificar esta rutina o eliminarla",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Confirmar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.value) {

                            let uri = "Tblentcln/submit";

                            this.fechainicial = new Date(this.fechainicial);
                            this.fechafinal = new Date(this.fechafinal);

                            let dateinicial = this.fechainicial.toISOString().slice(0, 19).replace('T', ' ');
                            let datefinal = this.fechafinal.toISOString().slice(0, 19).replace('T', ' ');

                            axios.post(uri, {
                                UuidOferta: this.ofertatemporal.Uuid,
                                Idnentusr: this.$auth.user().Id,
                                Idnentorg: this.ofertatemporal.Idnentorg,
                                Periodicidad: this.periodicidad,
                                FechaInicio: dateinicial,
                                FechaFinal: datefinal,
                            }).then(response => {
                                if (response.data.success) {
                                    uri = "Tblentdnc/finish";

                                    axios.post(uri, {
                                        Uuid: this.ofertatemporal.Uuid
                                    }).then(response => {
                                        if (response.data.success) {
                                            this.$toastr.Add({
                                                title: "Correcto", // Toast Title
                                                msg: response.data.message, // Toast Message
                                                type: "success", // Toast type,
                                            });
                                            this.ofertatemporal = null;
                                            this.refrescarTabla();
                                            this.refrescarCalendario();
                                            this.cerrarModalSeleccionar();
                                        } else {
                                            this.$toastr.Add({
                                                title: "Ocurrio un error", // Toast Title
                                                msg: response.data.message, // Toast Message
                                                type: "error", // Toast type,
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


                        }
                    });
                }
            },
            modificarOrganizacion() {
                Swal.fire({
                    title: '¿Modificar Rutina?',
                    text: "Despues puede modificar esta rutina o eliminarla",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Modificar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.value) {

                        let uri = "Tblentcln/modify";

                        this.fechainicial = new Date(this.fechainicial);
                        this.fechafinal = new Date(this.fechafinal);

                        this.fechainicial = this.fechainicial.setHours(this.hora - 6,0,0);
                        this.fechafinal = this.fechafinal.setHours(this.hora - 6,0,0);

                        this.fechainicial = new Date(this.fechainicial);
                        this.fechafinal = new Date(this.fechafinal);

                        let dateinicial = this.fechainicial.toISOString().slice(0, 19).replace('T', ' ');
                        let datefinal = this.fechafinal.toISOString().slice(0, 19).replace('T', ' ');

                        axios.post(uri, {
                            Uuid: this.eventotemporal.Uuid,
                            Periodicidad: this.periodicidad,
                            FechaInicio: dateinicial,
                            FechaFinal: datefinal,
                        }).then(response => {
                            if (response.data.success) {
                                uri = "Tblentdnc/finish";

                                axios.post(uri, {
                                    Uuid: this.ofertatemporal.Uuid
                                }).then(response => {
                                    if (response.data.success) {
                                        this.$toastr.Add({
                                            title: "Correcto", // Toast Title
                                            msg: response.data.message, // Toast Message
                                            type: "success", // Toast type,
                                        });

                                        this.ofertatemporal = null;
                                        this.refrescarTabla();
                                        this.refrescarCalendario();
                                        this.modificarbandera = false;
                                        this.cerrarModalSeleccionar();
                                    } else {
                                        this.$toastr.Add({
                                            title: "Ocurrio un error", // Toast Title
                                            msg: response.data.message, // Toast Message
                                            type: "error", // Toast type,
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


                    }
                });
            },
            eliminarOrganizacion() {
                Swal.fire({
                    title: '¿Eliminar Rutina?',
                    text: "Despues puede modificar esta rutina o eliminarla",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Cancelar',
                    cancelButtonText: 'Eliminar'
                }).then((result) => {
                    if (!result.value) {
                        let uri = "Tblentcln/remove";

                        axios.post(uri, {
                            Uuid: this.eventotemporal.Uuid,
                            UuidOferta: this.ofertatemporal.Uuid,
                        }).then(response => {
                            if (response.data.success) {
                                this.$toastr.Add({
                                    title: "Correcto", // Toast Title
                                    msg: response.data.message, // Toast Message
                                    type: "success", // Toast type,
                                });
                                this.refrescarTabla();
                                this.refrescarCalendario();
                                this.cerrarModalSeleccionar();
                                this.modificarbandera = false;
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
            },
            modificarEvento(info) {
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


                this.modificarbandera = true;
                this.periodicidad = this.eventotemporal.Prdentcln;
                const days = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado',];
                let d = new Date(this.eventotemporal.Fchinccln);
                this.fechainicial = d;
                this.dia = days[d.getDay()];
                this.modificarbandera = true;
                this.infotemporal = info;

                this.disabledDates = date => {
                    const today = d;
                    const day = date.getDay();

                    return day === 6 || day === 0 || date <= today
                };

                this.abrirModalSeleccionar();

            },
            refrescarTabla() {
                if (this.$auth.ready()) {
                    let uri = 'Tblentdnc/list';

                    axios.post(uri, {
                        Id: this.$auth.user().Id,
                    }).then(response => {
                        if (response.data.success) {
                            this.ofertas = response.data.data;
                        } else {
                            this.ofertas = null;
                        }
                    });
                }
            },
            refrescarCalendario() {
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
            abrirModalSeleccionar() {
                this.seleccionbandera = true;
            },
            cerrarModalSeleccionar() {
                this.seleccionbandera = false;
            },
            abrirModalInfo() {
                this.infobandera = true;
            },
            cerrarModalInfo() {
                this.infobandera = false;
            }
        },
        created() {
            this.refrescarTabla();
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
