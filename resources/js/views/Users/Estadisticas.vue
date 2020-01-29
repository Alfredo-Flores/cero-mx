<template>
    <div class="container md-offset"  >
        <div class="md-layout">
            <div class="md-layout-item md-medium-size-25 md-xsmall-size-100 md-size-25">
                <stats-card header-color="blue">
                    <div slot="header">
                        <div class="card-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <p class="category">Organizaciones </p>
                        <h3 class="title">
                            <animated-number :value=estadistica.organizaciones></animated-number>
                        </h3>
                    </div>

                    <div slot="footer">
                        <div class="stats">
                            <md-icon>add</md-icon>
                            Registradas
                        </div>
                    </div>
                </stats-card>
            </div>
            <div class="md-layout-item md-medium-size-25 md-xsmall-size-100 md-size-25">
                <stats-card header-color="blue">
                    <div slot="header">
                        <div class="card-icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <p class="category">Empresas</p>
                        <h3 class="title">
                            <animated-number :value=estadistica.empresas></animated-number>
                        </h3>
                    </div>

                    <div slot="footer">
                        <div class="stats">
                            <md-icon>add</md-icon>
                            Registradas
                        </div>
                    </div>
                </stats-card>
            </div>
            <div class="md-layout-item md-medium-size-25 md-xsmall-size-100 md-size-25">
                <stats-card header-color="green">
                    <div slot="header">
                        <div class="card-icon">
                            <i class="fas fa-apple-alt"></i>
                        </div>
                        <p class="category">Alimento Donado </p>
                        <h3 class="title">
                            <animated-number :value=estadistica.kilos></animated-number> kg
                        </h3>
                    </div>
                </stats-card>
            </div>
            <div class="md-layout-item md-medium-size-25 md-xsmall-size-100 md-size-25">
                <stats-card header-color="green">
                    <div slot="header">
                        <div class="card-icon">
                            <i class="fas fa-tree"></i>
                        </div>
                        <p class="category">CO2 evitado</p>
                        <h3 class="title">
                            <animated-number :value=estadistica.co2></animated-number> kg
                        </h3>
                    </div>

                </stats-card>
            </div>
        </div>
    </div>

</template>

<script>
    import StatsCard from "../../components/Cards/StatsCard";
    import AnimatedNumber from "../../components/AnimatedNumber";

    export default {
        name: "Estadisticas",
        components: {
            StatsCard,
            AnimatedNumber
        },
        data() {
            return {
                estadistica: null
            };
        },
        methods: {
            estadisticas(){
                axios.get('/estadisticas')
                    .then(response => {
                        this.estadistica = response.data.message;
                    })
                    .catch(e => {
                        console.log(e)
                    })
            }
        },
        created() {
            this.estadisticas();
        },
    }
</script>

<style scoped>

</style>
