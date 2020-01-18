<template>
    <footer class="footer bg-dark" style="margin-top: 1000px !important;">
        <div class="container md-offset">
            <div class="md-layout">

                <div
                    class="md-layout-item md-size-20 md-xsmall-size-100"
                >
                    <div class="copyright text-center h6">
                        &copy; 2020
                        <a href="http://www.magnimussoftware.com/" target="_blank"
                        >Magnimus Software</a
                        >, copyright

                    </div>
                </div>
                <div
                    class="md-layout-item md-size-65 md-xsmall-hide mx-auto"
                >
                    <ul class="h6">
                        <li><a href="#">Legal</a></li>
                        <li><a href="#">Terminos y condiciones</a></li>
                        <li><a href="#">Condiciones de privacidad</a></li>
                        <li><a href="#">¿Quienes somos?</a></li>
                        <li><a href="#">Trabajo</a></li>
                    </ul>
                </div>
                <div
                    class="md-layout-item md-size-15 md-xsmall-size-100 mx-auto"
                >
                    <md-field class="mt-auto">
                        <label>Language</label>
                        <md-select md-dense>
                            <md-option onclick="window.location.replace('/language/en')">English</md-option>
                            <md-option onclick="window.location.replace('/language/es')">Español</md-option>
                        </md-select>
                    </md-field>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
    export default {
        name: "footer"
    }
</script>

<style scoped>

</style>
