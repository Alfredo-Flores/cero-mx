<template>
    <div class="container md-offset" v-if="!$auth.check()" >
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


            <md-card class="">
                <md-card-content>
                    <div class="md-layout">
                        <div class="md-layout-item md-size-50 md-small-size-100">
                            <md-card class="md-elevation-10">
                                <md-card-media-cover>
                                    <md-card-media md-ratio="4:3">
                                        <img
                                            src='/img/Logo.png'
                                            alt="Thumbnail">
                                    </md-card-media>
                                </md-card-media-cover>
                            </md-card>
                        </div>
                        <div class="md-layout-item md-size-50 md-small-size-100">


                            <md-card>
                                <md-card-header  class="md-elevation-3 md-primary">
                                    <div class="md-title">
                                        ¿Qué es Cero?
                                    </div>
                                </md-card-header>

                                <md-card-expand>
                                    <md-card-expand-trigger v-on:click.native="queEsCero">
                                        <md-button class="md-icon-button">
                                            <md-icon>keyboard_arrow_down</md-icon>
                                        </md-button>
                                    </md-card-expand-trigger>
                                </md-card-expand>

                                <md-card-expand-content>
                                    <md-card-content>
                                        <p>{{quees}}</p>
                                    </md-card-content>
                                </md-card-expand-content>
                            </md-card>
                            <md-card>
                                <md-card-header class="md-elevation-3">
                                    <div class="md-title">
                                        ¿Cómo funciona?
                                    </div>
                                </md-card-header>

                                <md-card-expand>
                                    <md-card-expand-trigger v-on:click.native="comoFunciona">
                                        <md-button class="md-icon-button">
                                            <md-icon>keyboard_arrow_down</md-icon>
                                        </md-button>
                                    </md-card-expand-trigger>
                                </md-card-expand>

                                <md-card-expand-content>
                                    <md-card-content>
                                        <p>{{funcion}}</p>
                                    </md-card-content>
                                </md-card-expand-content>
                            </md-card>
                            <md-card>
                                <md-card-header class="md-elevation-3">
                                    <div class="md-title">
                                        ¿Cómo puedes contribuir?
                                    </div>
                                </md-card-header>

                                <md-card-expand>
                                    <md-card-expand-trigger v-on:click.native="comoContribuir">
                                        <md-button class="md-icon-button ">
                                            <md-icon>keyboard_arrow_down</md-icon>
                                        </md-button>
                                    </md-card-expand-trigger>
                                </md-card-expand>

                                <md-card-expand-content>
                                    <md-card-content>
                                        <p>{{contribuir}}</p>
                                    </md-card-content>
                                </md-card-expand-content>
                            </md-card>
                        </div>
                    </div>
                    <hr>
                    <div class="md-layout md-alignment-center-center">
                        <div class="md-layout-item md-size-100 text-center">
                            <h3>
                                Noticias
                            </h3>
                        </div>
                        <div class="md-layout md-alignment-center-center" v-if="Array.isArray(notices) && notices.length">
                            <div class="md-layout-item md-size-100 text-center" >
                                <h3>
                                    Noticias
                                </h3>
                            </div>
                            <div class="md-layout-item md-size-30 md-small-size-100 " v-for="notice in notices">
                                <md-card class="md-elevation-10">
                                    <md-card-area>
                                        <md-card-media>
                                            <img
                                                :src=notice.img
                                                alt="Thumbnail">
                                        </md-card-media>
                                        <md-card-header>
                                            <div class="md-title">
                                                <h3 class="md-title">
                                                    {{notice.title}}
                                                </h3>
                                            </div>
                                            <div class="md-subhead">
                                                {{notice.subtitle}}
                                            </div>
                                        </md-card-header>
                                        <md-card-content>
                                            {{notice.content}}
                                        </md-card-content>
                                    </md-card-area>
                                    <md-card-actions>
                                        <md-button>
                                            Leer más
                                        </md-button>
                                    </md-card-actions>
                                </md-card>
                            </div>
                        </div>
                        <div class="md-layout md-alignment-center-center" v-else>
                            <md-empty-state
                                md-icon="collections_bookmark"
                                md-label="No hay noticias disponibles">
                            </md-empty-state>
                        </div>
                    </div>
                </md-card-content>
            </md-card>
        </div>
    </div>
    <div class="container md-offset" v-else-if="$auth.check()">
        <div class="md-layout">
            <md-card class="">
                <md-card-content>
                    <div class="md-layout">
                        <div class="md-layout-item md-size-50 md-small-size-100">
                            <md-card class="md-elevation-10">
                                <md-card-media-cover>
                                    <md-card-media md-ratio="4:3">
                                        <img
                                            src='/img/Logo.png'
                                            alt="Thumbnail">
                                    </md-card-media>
                                </md-card-media-cover>
                            </md-card>

                        </div>
                        <div class="md-layout-item md-size-50 md-small-size-100">
                            <md-card>
                                <md-card-header  class="md-elevation-3 md-primary">
                                    <div class="md-title">
                                        ¿Qué es Cero?
                                    </div>
                                </md-card-header>

                                <md-card-expand>
                                    <md-card-expand-trigger v-on:click.native="queEsCero">
                                        <md-button class="md-icon-button">
                                            <md-icon>keyboard_arrow_down</md-icon>
                                        </md-button>
                                    </md-card-expand-trigger>
                                </md-card-expand>

                                <md-card-expand-content>
                                    <md-card-content>
                                        <p>{{quees}}</p>
                                    </md-card-content>
                                </md-card-expand-content>
                            </md-card>
                            <md-card>
                                <md-card-header class="md-elevation-3">
                                    <div class="md-title">
                                        ¿Cómo funciona?
                                    </div>
                                </md-card-header>

                                <md-card-expand>
                                    <md-card-expand-trigger v-on:click.native="comoFunciona">
                                        <md-button class="md-icon-button">
                                            <md-icon>keyboard_arrow_down</md-icon>
                                        </md-button>
                                    </md-card-expand-trigger>
                                </md-card-expand>

                                <md-card-expand-content>
                                    <md-card-content>
                                        <p> {{funcion}} </p>
                                    </md-card-content>
                                </md-card-expand-content>
                            </md-card>
                            <md-card>
                                <md-card-header class="md-elevation-3">
                                    <div class="md-title">
                                        ¿Cómo puedes contribuir?
                                    </div>
                                </md-card-header>

                                <md-card-expand>
                                    <md-card-expand-trigger v-on:click.native="comoContribuir">
                                        <md-button class="md-icon-button">
                                            <md-icon>keyboard_arrow_down</md-icon>
                                        </md-button>
                                    </md-card-expand-trigger>
                                </md-card-expand>

                                <md-card-expand-content>
                                    <md-card-content>
                                        <p> {{contribuir}} </p>
                                    </md-card-content>
                                </md-card-expand-content>
                            </md-card>
                        </div>
                    </div>
                    <hr>
                    <div class="md-layout md-alignment-center-center" v-if="Array.isArray(notices) && notices.length">
                        <div class="md-layout-item md-size-100 text-center" >
                            <h3>
                                Noticias
                            </h3>
                        </div>
                        <div class="md-layout-item md-size-30 md-small-size-100 " v-for="notice in notices">
                            <md-card class="md-elevation-10">
                                <md-card-area>
                                    <md-card-media>
                                        <img
                                            :src=notice.img
                                            alt="Thumbnail">
                                    </md-card-media>
                                    <md-card-header>
                                        <div class="md-title">
                                            <h3 class="md-title">
                                                {{notice.title}}
                                            </h3>
                                        </div>
                                        <div class="md-subhead">
                                            {{notice.subtitle}}
                                        </div>
                                    </md-card-header>
                                    <md-card-content>
                                        {{notice.content}}
                                    </md-card-content>
                                </md-card-area>
                                <md-card-actions>
                                    <md-button>
                                        Leer más
                                    </md-button>
                                </md-card-actions>
                            </md-card>
                        </div>
                    </div>
                    <div class="md-layout md-alignment-center-center" v-else>
                        <md-empty-state
                            md-icon="collections_bookmark"
                            md-label="No hay noticias disponibles">
                        </md-empty-state>
                    </div>
                </md-card-content>
            </md-card>
        </div>

    </div>
</template>
<script>
    import { ZoomCenterTransition } from "vue2-transitions";
    import StatsCard from "../components/Cards/StatsCard";
    import AnimatedNumber from "../components/AnimatedNumber";

    export default {
        components: {
            ZoomCenterTransition,
            StatsCard,
            AnimatedNumber
        },
        props: {
            backgroundColor: {
                type: String,
                default: "black"
            }
        },
        inject: {
            autoClose: {
                default: true
            }
        },
        data() {
            return {
                responsive: false,
                showMenu: false,
                menuTransitionDuration: 250,
                pageTransitionDuration: 300,
                year: new Date().getFullYear(),
                notices: [],
                estadistica: undefined,
                quees: "",
                funcion: "",
                contribuir: "",

            };
        },
        computed: {
            setPageClass() {
                return `${this.$route.name}-page`.toLowerCase();
            }
        },
        methods: {
            toggleSidebarPage() {
                if (this.$sidebar.showSidebar) {
                    this.$sidebar.displaySidebar(false);
                }
            },
            linkClick() {
                if (
                    this.autoClose &&
                    this.$sidebar &&
                    this.$sidebar.showSidebar === true
                ) {
                    this.$sidebar.displaySidebar(false);
                }
            },
            toggleSidebar() {
                this.$sidebar.displaySidebar(!this.$sidebar.showSidebar);
            },
            toggleNavbar() {
                document.body.classList.toggle("nav-open");
                this.showMenu = !this.showMenu;
            },
            closeMenu() {
                document.body.classList.remove("nav-open");
                this.showMenu = false;
            },
            onResponsiveInverted() {
                if (window.innerWidth < 991) {
                    this.responsive = true;
                } else {
                    this.responsive = false;
                }
            },
            estadisticas(){
                axios.get('/estadisticas')
                    .then(response => {
                        this.estadistica = response.data.message;
                    })
                    .catch(e => {
                        console.log(e)
                    })
            },
            queEsCero(){
                if(this.quees === ""){
                    this.quees = "Cero es un punto de encuentro entre organizaciones civiles que combaten el hambre y empresas donadoras de alimentos de segunda vida que a través de internet facilita el acuerdo y calendarización de donaciones.";
                } else{
                    this.quees = "";
                }
            },
            comoFunciona(){
                if(this.funcion === ""){
                    this.funcion = "Cero posee un catálogo de organizaciones civiles validadas mediante su constitución legal y planes de trabajo que buscan destacar entre ellas brindando servicios integrales de reconstrucción social. De esta manera las empresas registradas pueden recibir solicitudes de donación, revisar los perfiles de las organizaciones y tomar una decisión informada mediante las evaluaciones de impacto, calidad y diversidad de servicios para finalmente acordar una entrega de donación o calendarizar entregas periódicas.";
                }else{
                    this.funcion = "";
                }
            },
            comoContribuir(){
                if(this.contribuir === ""){
                    this.contribuir = "Regístrate como enlace de la cadena de valor, ofertando excedentes o alimentos de segunda vida que ya no cumplen con la calidad ofrecida por tu empresa o inscribe a tu organización civil para ser candidata a recibir estas donaciones y puedas mejorar o aumentar la capacidad de servicio que brindan.\n" +
                        "También puedes formar parte del equipo haciendo trabajo voluntario de soporte a las operaciones de la plataforma, brindado servicios probono a las organizaciones o mediante alguna donación especial a través del correo momentumdgo@gmail.com donde nos pondremos en contacto a la brevedad posible.";
                }else{
                    this.contribuir = "";
                }
            },
        },
        created() {
            this.estadisticas();
        },
        mounted() {
            this.onResponsiveInverted();
            window.addEventListener("resize", this.onResponsiveInverted);
        },
        beforeDestroy() {
            this.closeMenu();
            window.removeEventListener("resize", this.onResponsiveInverted);
        },
        beforeRouteUpdate(to, from, next) {
            // Close the mobile menu first then transition to next page
            if (this.showMenu) {
                this.closeMenu();
                setTimeout(() => {
                    next();
                }, this.menuTransitionDuration);
            } else {
                next();
            }
        },
    };
</script>
<style lang="scss" scoped>
    $scaleSize: 0.1;
    $zoomOutStart: 0.7;
    $zoomOutEnd: 0.46;
    @keyframes zoomIn8 {
        from {
            opacity: 0;
            transform: scale3d($scaleSize, $scaleSize, $scaleSize);
        }
        100% {
            opacity: 1;
        }
    }
    .wrapper-full-page .zoomIn {
        animation-name: zoomIn8;
    }
    @keyframes zoomOut8 {
        from {
            opacity: 1;
            transform: scale3d($zoomOutStart, $zoomOutStart, $zoomOutStart);
        }
        to {
            opacity: 0;
            transform: scale3d($zoomOutEnd, $zoomOutEnd, $zoomOutEnd);
        }
    }
    .wrapper-full-page .zoomOut {
        animation-name: zoomOut8;
    }
    .zindex{
        z-index: 10;
    }
</style>
