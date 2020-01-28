<template>
    <div class="md-layout">
        <div
            class="md-layout-item md-size-100 mx-auto"
        >
            <md-card>
                <md-card-header class="md-card-header-text md-card-header-primary">
                    <div class="card-text">
                        <h4 class="title">Ofertas calendarizadas y terminadas</h4>
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
                                <md-table-head>Cajas</md-table-head>
                                <md-table-head>Estado</md-table-head>
                            </md-table-row>
                            <md-table-row v-for="(oferta, i) in ofertas" :key="i">
                                <md-table-cell>{{ oferta.Identdnc }}</md-table-cell>
                                <md-table-cell>{{ oferta.Dscentdnc }}</md-table-cell>
                                <md-table-cell>{{ oferta.Tipentdnc }}</md-table-cell>
                                <md-table-cell>{{ oferta.Kgsentdnc }}</md-table-cell>
                                <md-table-cell>{{ oferta.Cntcjsdnc }}</md-table-cell>
                                <md-table-cell v-if="oferta.Fnsentdnc">
                                    Eliminado / Fuera del mercado
                                </md-table-cell>
                                <md-table-cell v-else>
                                    En calendario
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
            return {
                descripcion: "",
                tipo: "",
                kilogramos: "",
                cajas: "",
                ofertas: null,
            };
        },
        methods: {
            refrescarTabla(){
                if (this.$auth.ready()) {
                    let uri = 'Tblentdnc/fetch/finished';

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
