<template>
    <md-card class="">
        <md-card-content>
            <div v-if="Array.isArray(cursos) && cursos.length">
                <div class="md-layout" v-for="curso in cursos">
                    <div class="md-layout-item md-size-33 md-small-size-100">
                        <md-card class="md-elevation-10">
                            <md-card-media-cover>
                                <md-card-media md-ratio="4:3">
                                    <img
                                        src='/img/placeholder.jpg'
                                        alt="Thumbnail">
                                </md-card-media>
                            </md-card-media-cover>
                        </md-card>
                    </div>
                    <div class="md-layout-item md-size-77 md-small-size-100">
                        <h3>{{curso.titulo}}</h3>
                        <p>{{curso.descripcion}}</p>
                        <md-button  class="md-raised md-primary" :href="curso.link">Ver más</md-button>
                    </div>
                    <hr>
                </div>
                <hr>
            </div>
            <div v-else>
                <div class="md-layout md-alignment-center-center">
                    <div class="md-layout-item md-size-33 md-small-size-100">
                        <md-empty-state
                            md-icon="collections_bookmark"
                            md-label="No hay cursos disponibles">
                        </md-empty-state>
                    </div>
                </div>
            </div>
        </md-card-content>
    </md-card>

</template>

<script>
    export default {
        name: "Cursos",
        data() {
            return {
                cursos: [
                    {
                        titulo: 'Separacion de alimentos',
                        descripcion: 'Contenido Contenido Contenido Contenido Contenido Contenido Contenido Contenido Contenido ' +
                            'Contenido Contenido Contenido Contenido Contenido Contenido Contenido Contenido Contenido Contenido ',
                        link: 'https://www.youtube.com/watch?v=2mrO20wxO2c'
                    },
                    {
                        titulo: 'Separacion de alimentos2',
                        descripcion: 'Contenido2 Contenido2 Contenido Contenido Contenido Contenido Contenido Contenido Contenido ' +
                            'Contenido Contenido Contenido Contenido Contenido Contenido Contenido Contenido Contenido Contenido ',
                        link: 'https://www.youtube.com/watch?v=2mrO20wxO2c'
                    }
                ]
            };
        },
    }
</script>

<style scoped>

</style>
