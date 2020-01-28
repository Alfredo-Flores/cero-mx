<template>
    <div class="md-layout">
        <div class="md-layout-item md-size-70 md-small-size-100 mx-auto">
            <md-card>
                <md-card-header class="md-card-header-text md-card-header-primary">
                    <div class="card-text">
                        <h4 class="title">Rutina de hoy</h4>
                    </div>
                </md-card-header>
                <md-card-content>
                    <div v-if="rutinas == null">
                        <h4 class="title">¡Parece que no hay rutinas para hoy!</h4>
                    </div>
                    <div v-else>
                        <md-table>
                            <md-table-row>
                                <md-table-head md-numeric>ID</md-table-head>
                                <md-table-head>Empresa</md-table-head>
                                <md-table-head>Dirección</md-table-head>
                                <md-table-head>Hora</md-table-head>
                                <md-table-head>Revisión</md-table-head>
                            </md-table-row>
                            <md-table-row v-for="(rutina, i) in rutinas" :key="i">
                                <md-table-cell>{{ rutina.Idnentrcp }}</md-table-cell>
                                <md-table-cell>{{ rutina.Namentemp }}</md-table-cell>
                                <md-table-cell>{{ rutina.Drcentemp }}</md-table-cell>
                                <md-table-cell>{{ new Date(rutina.Fchinccln).getHours()}}:00 {{ ((new Date(rutina.Fchinccln).getHours()) < 12 ? "AM" : "PM") }}</md-table-cell>
                                <md-table-cell >
                                    <md-button
                                        class="md-just-icon md-primary text-center"
                                        @click="abrirModalRutina(rutina)"
                                    ><md-icon>done</md-icon></md-button
                                    >
                                </md-table-cell>
                            </md-table-row>
                        </md-table>
                    </div>
                </md-card-content>
            </md-card>
        </div>

        <modal v-if="modalrutina" @close="cerrarModalRutina" style="z-index: 3">
            <template slot="header">
                <div class="m-4">
                    <h4 class="modal-title">Evaluación</h4>
                    <md-button
                        class="md-simple md-just-icon md-round modal-default-button"
                        @click="cerrarModalRutina"
                    >
                        <md-icon>clear</md-icon>
                    </md-button>
                </div>
            </template>

            <template slot="body">
                <p>Nombre de la empresa: {{ rutinatemporal.Namentemp }}</p>
                <p>Domicilio y localidad de la empresa: {{ rutinatemporal.Drcentemp }}, {{ rutinatemporal.Lclentemp }}</p>
                <p>Contacto: {{ rutinatemporal.Tlfofiemp }}, {{ rutinatemporal.Emlofiemp }}</p>
                <p>Horario: {{ new Date(rutinatemporal.Fchinccln).getHours() }}:00 {{ ((new Date(rutinatemporal.Fchinccln).getHours()) < 12 ? "AM" : "PM") }}</p>
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

                    <star-rating v-model="rating" :rating="rating" :increment="0.5"/>

            </template>

            <template slot="footer">
                <md-button class="md-simple m-2" @click="cerrarModalRutina">Cerrar</md-button>
                <md-button class="md-primary m-2" @click="evaluarRutina">Evaluar</md-button>
            </template>
        </modal>

    </div>
</template>

<script>

    import Swal from "sweetalert2";
    import Modal from "../../components/Modal.vue";
    import StarRating from 'vue-star-rating';

    export default {
        components: {
            Modal,
            StarRating
        },
        data() {
            return {
                tipo: null,
                kilogramos: null,
                cajas: null,
                rating: null,
                rutinas: null,
                rutinatemporal: null,
                modalrutina: false,
            };
        },
        methods: {
            refrescarRutinas(){
                if (this.$auth.ready()) {
                    let uri = 'Tblentrcp/fetch';

                    axios.post(uri, {
                        Id: this.$auth.user().Id,
                    }).then(response => {
                        if (response.data.success) {
                            this.rutinas = response.data.data;
                        } else {
                            this.rutinas = null;
                        }
                    });
                }
            },
            evaluarRutina() {

                Swal.fire({
                    title: '¿Estas seguro de mandar esta evaluación?',
                    text: "Ya no se podra modificar una vez evaluada",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, evaluar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.value) {
                        let uri = "Tblentrcp/evaluate";

                        axios.post(uri, {
                            Uuid: this.rutinatemporal.Uuid,
                            Tipentrcp: this.tipo,
                            Kgsentrcp: this.kilogramos,
                            Cntcjsrcp: this.cajas,
                            Rtnentcln: this.rating,
                        }).then(response => {
                            if (response.data.success) {
                                this.$toastr.Add({
                                    title: "Correcto", // Toast Title
                                    msg: response.data.message, // Toast Message
                                    type: "success", // Toast type,
                                });

                                this.cerrarModalRutina();
                                this.refrescarRutinas();
                                this.rutinatemporal = null;
                            } else {
                                this.$toastr.Add({
                                    title: "Ocurrio un error", // Toast Title
                                    msg: response.data.message, // Toast Message
                                    type: "error", // Toast type,
                                });
                            }
                        });
                    }
                })
            },
            abrirModalRutina(rutina) {
                this.rutinatemporal = rutina;

                this.modalrutina = true;
            },
            cerrarModalRutina() {
                this.modalrutina = false;
            }
        },
        created() {
            this.refrescarRutinas();
        },
    };
</script>
