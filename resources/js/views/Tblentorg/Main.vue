<template>
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
                    <div v-if="ofertas == null">
                        <h4 class="title">Parece que esta vacio!</h4>
                    </div>
                    <div v-else>
                        <md-table>
                            <md-table-row>
                                <md-table-head md-numeric>ID</md-table-head>
                                <md-table-head>Empresa</md-table-head>
                                <md-table-head>Logo</md-table-head>
                                <md-table-head>Descripción</md-table-head>
                                <md-table-head>Tipo</md-table-head>
                                <md-table-head>Peso</md-table-head>
                                <md-table-head>Cajas</md-table-head>
                                <md-table-head>Tiempo restante</md-table-head>
                                <md-table-head>Solicitud</md-table-head>
                            </md-table-row>
                            <md-table-row v-for="(oferta, i) in ofertas" :key="i">
                                <md-table-cell>{{ oferta.Identdnc }}</md-table-cell>
                                <md-table-cell>{{ oferta.Namentemp }}</md-table-cell>
                                <md-table-cell><md-icon>insert_emoticon</md-icon></md-table-cell>
                                <md-table-cell>{{ oferta.Dscentdnc }}</md-table-cell>
                                <md-table-cell>{{ oferta.Tipentdnc }}</md-table-cell>
                                <md-table-cell>{{ oferta.Kgsentdnc }}</md-table-cell>
                                <md-table-cell>{{ oferta.Cntcjsdnc }}</md-table-cell>
                                <md-table-cell>{{ oferta.Tmprstdnc }} días</md-table-cell>
                                <md-table-cell >
                                    <md-button
                                        class="md-just-icon md-primary text-center"
                                        @click="solicitarOferta(oferta)"
                                    ><md-icon>call</md-icon></md-button
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
    import Swal from "sweetalert2";

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
                ofertas: [],
            };
        },
        methods: {
            solicitarOferta(oferta) {
                const lines = ['Los datos de esta solicitud son: ',
                    "Empresa: " + oferta.Namentemp,
                    "Oferta: " + oferta.Dscentdnc,
                    "Correo: " + oferta.Tlfofiemp,
                    "Telefono: " + oferta.Emlofiemp,
                    "Detalles por entrega: " + oferta.Detentemo];

                Swal.fire({
                    title: 'Solicitud',
                    text: lines.join('\n\n'),
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, solicitar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.value) {
                        let uri = 'Tblentdnc/remove';

                        axios.post(uri, {
                            Uuid: oferta.Uuid,
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
            },
        },
        created() {
            this.refrescarTabla();
        },
    }
</script>
