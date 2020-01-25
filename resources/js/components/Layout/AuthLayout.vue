<template>
  <div class="full-page" :class="{ 'nav-open': $sidebar.showSidebar }">
      <md-toolbar md-elevation="8" class="md-primary md-toolbar-absolute md-absolute">
          <div class="md-toolbar-row md-offset">
              <div class="md-toolbar-section-start">
                  <h1 @click="linkClick" class="md-title">CERO HAMBRE</h1>
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
                          <md-list-item to="/">
                              <md-icon >house</md-icon>Inicio
                          </md-list-item>
                          <md-list-item v-if="!$auth.check()" to="/register">
                              <md-icon>person_add</md-icon>Registro
                          </md-list-item>
                          <md-list-item v-if="!$auth.check()" to="/login">
                              <md-icon>fingerprint</md-icon>Iniciar Sesión
                          </md-list-item>
                          <md-list-item v-if="$auth.check('usuario')" to="/registerinstitution">
                              <md-icon>fingerprint</md-icon>Registrar Institución
                          </md-list-item>
                          <md-list-item v-if="$auth.check('empresa')" to="/empresa/oferta">
                              <md-icon>fingerprint</md-icon>Empresa
                          </md-list-item>
                          <md-list-item v-if="$auth.check('organizacion')" to="/organizacion/oferta">
                              <md-icon>fingerprint</md-icon>Organización
                          </md-list-item>
                          <md-list-item v-if="$auth.check()" to="/estadisticas">
                              <md-icon>dashboard</md-icon>
                              Estadisticas
                          </md-list-item>

                          <md-list-item v-if="$auth.check()" to="/cursos">
                              <md-icon>ondemand_video</md-icon>
                              Cursos
                          </md-list-item>

                          <md-list-item v-if="$auth.check()" to="/organizaciones">
                              <md-icon>person</md-icon>
                              Organizaciones publicas
                          </md-list-item>
                          <md-list-item v-if="$auth.check()" @click.prevent="logout">
                              <md-icon>exit_to_app</md-icon>
                              Salir
                          </md-list-item>

                      </md-list>
                  </div>
              </div>
          </div>
      </md-toolbar>

    <div class="wrapper wrapper-full-page" @click="toggleSidebarPage">
      <div
        class="page-header header-filter"
        :class="setPageClass"
        filter-color="black"
        :style="setBgImage"
      >
        <div class="container md-offset">
          <zoom-center-transition
            :duration="pageTransitionDuration"
            mode="out-in"
          >
            <router-view></router-view>
          </zoom-center-transition>
        </div>
        <footer class="footer">
          <div class="container md-offset">
            <nav>
              <ul>
                <li>
                  <router-link :to="{ path: '/dashboard' }">Legal</router-link>
                </li>
              </ul>
            </nav>
            <div class="copyright text-center">
              &copy; {{ new Date().getFullYear() }}
              <a
                href="/"
                target="_blank"
                >Magnimus Software</a
              >, Hecho en Durango, dgo. México
            </div>
          </div>
        </footer>
      </div>
    </div>
  </div>
</template>
<script>
import { ZoomCenterTransition } from "vue2-transitions";

export default {
  components: {
    ZoomCenterTransition
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
      year: new Date().getFullYear()
    };
  },
  computed: {
    setBgImage() {
      return {
        backgroundImage: `url(./img/bg-pricing.jpg)`
      };
    },
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
      logout() {
          this.$auth.logout();
      }
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
  }
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
</style>
