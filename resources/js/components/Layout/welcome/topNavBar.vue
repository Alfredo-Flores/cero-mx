<template>
    <md-toolbar md-elevation="8" class="md-primary md-toolbar-absolute md-absolute">
        <div class="md-toolbar-row md-offset">
            <div class="md-toolbar-section-start">
                <h1 class="md-title">CERO HAMBRE</h1>
            </div>
            <div class="md-toolbar-section-end">
                <md-button
                    class="md-just-icon md-simple md-round md-toolbar-toggle"
                    :class="{ toggled: $sidebar.showSidebar }"
                    @click="toggleSidebar"
                >
                    <span class="icon-bar"/>
                    <span class="icon-bar"/>
                    <span class="icon-bar"/>
                </md-button>

                <div
                    class="md-collapse"
                    :class="{ 'off-canvas-sidebar': responsive }"
                >
                    <md-list>
                        <md-list-item href="/">
                            <md-icon>house</md-icon>
                            Inicio
                        </md-list-item>
                        @guest
                        <md-list-item href="/register" >
                            <md-icon>person_add</md-icon>
                            Registro
                        </md-list-item>
                        <md-list-item href="/login">
                            <md-icon>fingerprint</md-icon>
                            Iniciar Sesión
                        </md-list-item>
                        @else
                        <md-list-item href="#">
                            <md-icon>dashboard</md-icon>
                            Estadisticas
                        </md-list-item>

                        <md-list-item href="#">
                            <md-icon>ondemand_video</md-icon>
                            Cursos
                        </md-list-item>

                        <md-list-item href="#">
                            <md-icon>person</md-icon>
                            Organizaciones publicas
                        </md-list-item>

                    </md-list>
                </div>
            </div>
        </div>
    </md-toolbar>

</template>

<script>
    export default {
        name: "topNavBar"
    }
</script>

<style scoped>

</style>
