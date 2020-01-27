<template>
    <div
        class="wrapper"
        :class="[
      { 'nav-open': $sidebar.showSidebar },
    ]"
    >
        <side-bar
            :active-color="sidebarBackground"
            :background-image="sidebarBackgroundImage"
            :data-background-color="sidebarBackgroundColor"
        >
            <template slot="links">
                <sidebar-item
                        :link="{ name: 'Oferta', icon: 'dashboard', path: '/empresa/oferta' }"
                >
                </sidebar-item>
                <sidebar-item
                        :link="{ name: 'Calendario', icon: 'date_range', path: '/empresa/calendario' }"
                >
                </sidebar-item>
                <sidebar-item
                        :link="{ name: 'Historial', icon: 'history', path: '/empresa/historial' }"
                >
                </sidebar-item>
                <sidebar-item
                        :link="{ name: 'Mi Perfil', icon: 'account_box', path: '/empresa/perfil' }"
                >
                </sidebar-item>
                <md-list class="nav" @click="logout">
                    <li class="nav-item">
                        <a class="nav-link" >
                            <i class="material-icons">exit_to_app</i>
                            <p>Salir</p>
                        </a>
                    </li>
                </md-list>
            </template>
        </side-bar>
        <div class="main-panel">
            <top-navbar></top-navbar>

            <div
                @click="toggleSidebar"
                style="z-index: -1"
            >
                <zoom-center-transition :duration="200" mode="out-in">
                    <!-- your content here -->
                    <router-view></router-view>
                </zoom-center-transition>
            </div>

            <content-footer style=" bottom: 0; z-index: 1;"></content-footer>
        </div>
    </div>
</template>
<script>
    import PerfectScrollbar from "perfect-scrollbar";
    import "perfect-scrollbar/css/perfect-scrollbar.css";

    function hasElement(className) {
        return document.getElementsByClassName(className).length > 0;
    }

    function initScrollbar(className) {
        if (hasElement(className)) {
            new PerfectScrollbar(`.${className}`);
            document.getElementsByClassName(className)[0].scrollTop = 0;
        } else {
            // try to init it later in case this component is loaded async
            setTimeout(() => {
                initScrollbar(className);
            }, 100);
        }
    }

    function reinitScrollbar() {
        let docClasses = document.body.classList;
        let isWindows = navigator.platform.startsWith("Win");
        if (isWindows) {
            // if we are on windows OS we activate the perfectScrollbar function
            initScrollbar("sidebar");
            initScrollbar("sidebar-wrapper");
            initScrollbar("main-panel");

            docClasses.add("perfect-scrollbar-on");
        } else {
            docClasses.add("perfect-scrollbar-off");
        }
    }

    import TopNavbar from "./TopNavbar.vue";
    import ContentFooter from "./ContentFooter.vue";
    import { ZoomCenterTransition } from "vue2-transitions";

    export default {
        components: {
            ContentFooter,
            ZoomCenterTransition,
            TopNavbar
        },
        data() {
            return {
                sidebarBackgroundColor: "black",
                sidebarBackground: "green",
                sidebarBackgroundImage: "./img/sidebar-2.jpg",
                sidebarMini: true,
                sidebarImg: true
            };
        },
        methods: {
            toggleSidebar() {
                if (this.$sidebar.showSidebar) {
                    this.$sidebar.displaySidebar(false);
                }
            },
            minimizeSidebar() {
                if (this.$sidebar) {
                    this.$sidebar.toggleMinimize();
                }
            },
            logout() {
                this.$auth.logout();
            }
        },
        updated() {
            reinitScrollbar();
        },
        mounted() {
            reinitScrollbar();
        },
        beforeCreate() {
            this.$sidebar.toggleMinimize();
        },
        watch: {
            sidebarMini() {
                this.minimizeSidebar();
            }
        }
    };
</script>
<style lang="scss">
    $scaleSize: 0.95;
    @keyframes zoomIn95 {
        from {
            opacity: 0;
            transform: scale3d($scaleSize, $scaleSize, $scaleSize);
        }
        to {
            opacity: 1;
        }
    }

    .main-panel .zoomIn {
        animation-name: zoomIn95;
    }

    @keyframes zoomOut95 {
        from {
            opacity: 1;
        }
        to {
            opacity: 0;
            transform: scale3d($scaleSize, $scaleSize, $scaleSize);
        }
    }

    .main-panel .zoomOut {
        animation-name: zoomOut95;
    }
</style>
