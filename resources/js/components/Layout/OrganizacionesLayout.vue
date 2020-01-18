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
                <md-list class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/Tblentdnc">
                            <i class="material-icons">format_list_numbered</i>
                            <p>Buscar ofertas</p>
                        </a>
                    </li>
                </md-list>
                <md-list class="nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="/Tblentcln">
                            <i class="material-icons">date_range</i>
                            <p>Calendario</p>
                        </a>
                    </li>
                </md-list>
                <md-list class="nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="/Tblentprs">
                            <i class="material-icons">account_box</i>
                            <p>Mi Perfil</p>
                        </a>
                    </li>
                </md-list>
                <md-list class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/Users/submit/logout">
                            <i class="material-icons">exit_to_app</i>
                            <p>Salir</p>
                        </a>
                    </li>
                </md-list>
            </template>
        </side-bar>
        <div class="main-panel">

            <div
                @click="toggleSidebar"
                style="z-index: -1"
            >
                <slot></slot>
            </div>

            <content-footer style=" bottom: 0; z-index: 1;"></content-footer>
        </div>
    </div>
</template>
<script>
    import ContentFooter from "./ContentFooter.vue";
    import {ZoomCenterTransition} from "vue2-transitions";

    export default {
        components: {
            ContentFooter,
            ZoomCenterTransition
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
            }
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
