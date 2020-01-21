<template>
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
                        <label>Tipo de alimento</label>
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
                    <md-button v-if="modificarBoton" class="md-raised md-primary" @click="crearOfertaConfirmado">Modificar</md-button>
                    <md-button v-else class="md-raised md-primary" @click="crearOferta">Ofertar</md-button>

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
                    <div v-if="ofertas == null">
                        <h4 class="title">Parece que esta vacio!</h4>
                    </div>
                    <div v-else>
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
                            <md-table-row v-for="(oferta, i) in ofertas" :key="i">
                                <md-table-cell>{{ oferta.Identdnc }}</md-table-cell>
                                <md-table-cell>{{ oferta.Dscentdnc }}</md-table-cell>
                                <md-table-cell>{{ oferta.Tipentdnc }}</md-table-cell>
                                <md-table-cell>{{ oferta.Kgsentdnc }}</md-table-cell>
                                <md-table-cell>{{ oferta.Cntcjsdnc }}</md-table-cell>
                                <md-table-cell>{{ oferta.Tmprstdnc }} días</md-table-cell>
                                <md-table-cell v-if="oferta.Rqsentdnc">
                                    <md-button
                                        class="md-just-icon"
                                        @click="avisoPeticion"
                                    ><md-icon>notifications</md-icon></md-button
                                    >
                                </md-table-cell>
                                <md-table-cell v-else>
                                    <md-button
                                        class="md-just-icon md-danger"
                                        @click="borrarOferta(oferta.Uuid)"
                                    ><md-icon>close</md-icon></md-button
                                    >
                                    <md-button
                                        @click="modificarOferta(oferta)"
                                        class="md-just-icon md-warning"
                                    ><md-icon>edit</md-icon></md-button
                                    >
                                </md-table-cell>
                            </md-table-row>
                        </md-table>
                    </div>
                </md-card-content>
            </md-card>
        </div>
    </div>
</template>

<script>
    import Swal from 'sweetalert2';

    export default {
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
                ofertas: null,
                modificarBoton: false,
                modificarUuid: null,
            };
        },
        methods: {
            borrarOferta(Uuid) {
                Swal.fire({
                    title: 'Borrar',
                    text: "¿Esta seguro de borrar esta oferta?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, borrar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.value) {
                        let uri = 'Tblentdnc/remove';

                        axios.post(uri, {
                            Uuid: Uuid,
                        }).then(response => {
                            if (response.data.success) {
                                this.refrescarTabla();
                            } else {
                                this.$toastr.Add({
                                    title: "Ocurrio un error", // Toast Title
                                    msg: response.data.message, // Toast Message
                                    type: "error", // Toast type,
                                });

                                this.refrescarTabla();
                            }
                        });
                    }
                })
            },
            modificarOferta(oferta) {
                Swal.fire({
                    title: 'Modificar',
                    text: "¿Esta seguro de modificar esta oferta?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, modificarla',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.value) {
                        this.modificarUuid = oferta.Uuid;

                        this.descripcion = oferta.Dscentdnc;
                        this.tipo = oferta.Tipentdnc;
                        this.kilogramos = oferta.Kgsentdnc;
                        this.cajas = oferta.Cntcjsdnc;

                        this.modificarBoton = true;
                    }
                })
            },
            crearOfertaConfirmado() {
                let uri = 'Tblentdnc/modify';

                let tiempomysql = new Date(this.tiempo).toISOString().slice(0, 19).replace('T', ' ');

                axios.post(uri, {
                    Uuid: this.modificarUuid,
                    Descripcion: this.descripcion,
                    TipoAlimento: this.tipo,
                    Kilogramos: this.kilogramos,
                    CantCajas: this.cajas,
                    TiempoRestante: tiempomysql
                }).then(response => {
                    if (response.data.success) {
                        this.descripcion = "";
                        this.tipo = "";
                        this.kilogramos = "";
                        this.cajas = "";

                        this.refrescarTabla();
                        this.modificarBoton = false;
                    } else {
                        this.$toastr.Add({
                            title: "Ocurrio un error", // Toast Title
                            msg: response.data.message, // Toast Message
                            type: "error", // Toast type,
                        });
                        this.refrescarTabla();
                    }
                });
            },
            avisoPeticion() {
                Swal.fire({
                    title: '¡Revisa tu calendario!',
                    text: "Parece ser que esta oferta le intersa a una organización",
                    icon: 'warning',
                    confirmButtonText: 'Entendido'
                })
            },
            crearOferta() {
                let uri = 'Tblentdnc/submit';

                let tiempomysql = new Date(this.tiempo).toISOString().slice(0, 19).replace('T', ' ');

                axios.post(uri, {
                    Id: this.$auth.user().Id,
                    Descripcion: this.descripcion,
                    TipoAlimento: this.tipo,
                    Kilogramos: this.kilogramos,
                    CantCajas: this.cajas,
                    TiempoRestante: tiempomysql,
                    modificarBoton: false,
                }).then(response => {
                    if (response.data.success) {
                        this.$toastr.Add({
                            title: "Se ha subido correctamente la oferta", // Toast Title
                            msg: response.data.message, // Toast Message
                            type: "success", // Toast type,
                        });

                        this.descripcion = "";
                        this.tipo = "";
                        this.kilogramos = "";
                        this.cajas = "";

                        this.refrescarTabla();
                    } else {
                        this.$toastr.Add({
                            title: "Ocurrio un error", // Toast Title
                            msg: response.data.message, // Toast Message
                            type: "error", // Toast type,
                        });
                    }
                });
            },
            refrescarTabla(){
                if (this.$auth.ready()) {
                    let uri = 'Tblentdnc/fetch';

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
            }
        },
        created() {
            this.refrescarTabla();
        },
    }
</script>
