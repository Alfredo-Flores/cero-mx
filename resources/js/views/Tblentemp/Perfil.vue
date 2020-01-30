<template>
    <div class="md-layout md-gutter md-alignment-top-center">
        <div class="md-layout-item md-size-50 md-small-size-100">
            <md-card>
            <md-card-header class="md-card-header-icon md-card-header-green">
                <div class="card-icon">
                    <md-icon>account_box</md-icon>
                </div>
                <h4 class="title">Representante</h4>
            </md-card-header>
            <md-card-content>
                    <div>
                        <md-list class="md-double-line">
                            <md-subheader>Datos Generales</md-subheader>
                            <md-list-item>
                                <md-icon class="md-primary">face</md-icon>

                                <div class="md-list-item-text">
                                    <span>{{profileData.Nombre}} {{profileData.ApellidoP}} {{profileData.ApellidoM}}</span>
                                </div>

                                <md-avatar class="md-avatar-icon md-large md-accent">
                                    <md-icon>portrait</md-icon>
                                </md-avatar>
                            </md-list-item>
                            <md-list-item>
                                <md-icon class="md-primary">place</md-icon>

                                <div class="md-list-item-text">
                                    <span>{{profileData.Pais}}, {{profileData.Estado}}, {{profileData.Municipio}}, {{profileData.Domicilio}}</span>
                                    <span>Direccion</span>
                                </div>
                            </md-list-item>
                            <md-divider></md-divider>
                            <md-subheader>Teléfono</md-subheader>
                            <md-list-item>
                                <md-icon class="md-primary">phone</md-icon>

                                <div class="md-list-item-text">
                                    <span>{{profileData.TelFijo}}</span>
                                    <span>Teléfono fijo</span>
                                </div>
                            </md-list-item>
                            <md-list-item>
                                <md-icon class="md-primary">smartphone</md-icon>

                                <div class="md-list-item-text">
                                    <span>{{profileData.TelMovil}}</span>
                                    <span>Teléfono movil</span>
                                </div>
                            </md-list-item>
                            <md-divider></md-divider>
                            <md-subheader>Email</md-subheader>
                            <md-list-item>
                                <md-icon class="md-primary">email</md-icon>

                                <div class="md-list-item-text">
                                    <span>{{profileData.CorreoP}}</span>
                                    <span>Personal</span>
                                </div>
                            </md-list-item>
                            <md-list-item>
                                <md-icon class="md-primary">email</md-icon>
                                <div class="md-list-item-text">
                                    <span>{{profileData.CorreoL}}</span>
                                    <span>Laboral</span>
                                </div>
                            </md-list-item>
                        </md-list>
                    </div>
            </md-card-content>
            </md-card>
        </div>
        <div class="md-layout-item md-size-50 md-small-size-100">
            <md-card>
            <md-card-header class="md-card-header-icon md-card-header-green">
                <div class="card-icon">
                    <md-icon>assignment</md-icon>
                </div>
                <h4 class="title">Empresa</h4>
            </md-card-header>
            <md-card-content>
                <div>
                    <md-list class="md-double-line">
                        <md-subheader>Datos Generales</md-subheader>
                        <md-list-item>
                            <md-icon class="md-primary">person</md-icon>

                            <div class="md-list-item-text">
                                <span>{{profileData.NombreEmp}}</span>
                                <span>Nombre de la Empresa</span>
                            </div>

                            <md-avatar class="md-avatar-icon md-large md-accent">
                                <md-icon>favorite</md-icon>
                            </md-avatar>
                        </md-list-item>
                        <md-list-item>
                            <md-icon class="md-primary">place</md-icon>

                            <div class="md-list-item-text">
                                <span>{{profileData.PaisEmp}}, {{profileData.EntidadEmp}}, {{profileData.MunicipioEmp}}, {{profileData.LocalidadEmp}}, {{profileData.Direccion}}</span>
                                <span>Direccion</span>
                            </div>
                        </md-list-item>
                        <md-list-item>
                            <md-icon class="md-primary">business_center</md-icon>

                            <div class="md-list-item-text">
                                <span>{{profileData.Giro}}</span>
                                <span>Giro</span>
                            </div>
                        </md-list-item>
                        <md-divider></md-divider>
                        <md-subheader>Contacto</md-subheader>
                        <md-list-item>
                            <md-icon class="md-primary">phone</md-icon>

                            <div class="md-list-item-text">
                                <span>{{profileData.TelEmp}}</span>
                                <span>Teléfono fijo</span>
                            </div>
                        </md-list-item>
                        <md-list-item>
                            <md-icon class="md-primary">email</md-icon>

                            <div class="md-list-item-text">
                                <span>{{profileData.CorreoEmp}}</span>
                                <span>Correo electrónico</span>
                            </div>
                        </md-list-item>
                    </md-list>
                </div>

            </md-card-content>
            </md-card>
        </div>
    </div>
</template>

<script>
    import StatsCard from "../../components/Cards/StatsCard";
    import AnimatedNumber from "../../components/AnimatedNumber";

    export default {
        name: "Perfil",
        components:{
            StatsCard,
            AnimatedNumber
        },
        data() {
            return{
                profileData: {}
            }
        },
        methods: {
            profile (){
                let uri = '/Tblentemp/profile';
                axios.post(uri, this.$auth.user())
                .then(response => {
                    if(response.data.success){
                        this.profileData = response.data.message;
                    }
                    else {
                        this.profileData = {
                            Nombre: 'error'
                        }
                    }
                })
                .catch(error =>{
                    this.profileData = error;
                })
            }
        },
        created() {
            this.profile();
        }

    }
</script>

<style scoped>

</style>
