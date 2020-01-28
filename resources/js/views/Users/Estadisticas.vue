<template>
    <div class="container md-offset"  >
        <div class="md-layout">
            <div class="md-layout-item md-medium-size-25 md-xsmall-size-100 md-size-25">
                <stats-card header-color="green">
                    <div slot="header">
                        <div class="card-icon">
                            <i class="fab fa-twitter"></i>
                        </div>
                        <p class="category">Organizaciones registradas</p>
                        <h3 class="title">
                            +<animated-number :value="245"></animated-number>
                        </h3>
                    </div>

                    <div slot="footer">
                        <div class="stats">
                            <md-icon>update</md-icon>
                            Just Updated
                        </div>
                    </div>
                </stats-card>
            </div>
            <div class="md-layout-item md-medium-size-25 md-xsmall-size-100 md-size-25">
                <stats-card header-color="blue">
                    <div slot="header">
                        <div class="card-icon">
                            <i class="fab fa-twitter"></i>
                        </div>
                        <p class="category">Empresas registradas</p>
                        <h3 class="title">
                            +<animated-number :value="245"></animated-number>
                        </h3>
                    </div>

                    <div slot="footer">
                        <div class="stats">
                            <md-icon>update</md-icon>
                            Just Updated
                        </div>
                    </div>
                </stats-card>
            </div>
            <div class="md-layout-item md-medium-size-25 md-xsmall-size-100 md-size-25">
                <stats-card header-color="blue">
                    <div slot="header">
                        <div class="card-icon">
                            <i class="fab fa-twitter"></i>
                        </div>
                        <p class="category">Kilos de Alimento</p>
                        <h3 class="title">
                            +<animated-number :value="245"></animated-number>
                        </h3>
                    </div>

                    <div slot="footer">
                        <div class="stats">
                            <md-icon>update</md-icon>
                            Just Updated
                        </div>
                    </div>
                </stats-card>
            </div>
            <div class="md-layout-item md-medium-size-25 md-xsmall-size-100 md-size-25">
                <stats-card header-color="blue">
                    <div slot="header">
                        <div class="card-icon">
                            <i class="fab fa-twitter"></i>
                        </div>
                        <p class="category">CO2 evitado</p>
                        <h3 class="title">
                            +<animated-number :value="245"></animated-number>
                        </h3>
                    </div>

                    <div slot="footer">
                        <div class="stats">
                            <md-icon>update</md-icon>
                            Just Updated
                        </div>
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
    }
</script>

<style scoped>

</style>
