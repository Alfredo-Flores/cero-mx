<template>
  <div class="full-page" :class="{ 'nav-open': $sidebar.showSidebar }">
      <md-toolbar md-elevation="8" class="md-primary md-toolbar-absolute md-absolute">
          <div class="md-toolbar-row md-offset">
              <div class="md-toolbar-section-start">
                  <h1 href="#/" @click="linkClick" class="md-title">CERO HAMBRE</h1>
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
                          <md-list-item>
                              <md-icon>house</md-icon>
                              <router-link to="/">Inicio</router-link>
                          </md-list-item>
                          <md-list-item>
                              <md-icon>person_add</md-icon>
                              <router-link to="/register">Registro</router-link>
                          </md-list-item>
                          <md-list-item>
                              <md-icon>fingerprint</md-icon>
                              <router-link to="/login">Iniciar Sesión</router-link>
                          </md-list-item>
                          <md-list-item>
                              <md-icon>fingerprint</md-icon>
                              <router-link to="/oferta">Administración</router-link>
                          </md-list-item>
                          <md-list-item v-if="$auth.check()" @click.prevent="$auth.logout()">
                              <md-icon>fingerprint</md-icon>
                              Salir
                          </md-list-item>
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
                  <router-link :to="{ path: '/dashboard' }">Home</router-link>
                </li>
                <li>
                  <a href="#">
                    Company
                  </a>
                </li>
                <li>
                  <a href="#">
                    Portfolio
                  </a>
                </li>
                <li>
                  <a href="#">
                    Blog
                  </a>
                </li>
              </ul>
            </nav>
            <div class="copyright text-center">
              &copy; {{ new Date().getFullYear() }}
              <a
                href="https://www.creative-tim.com/?ref=mdf-vuejs"
                target="_blank"
                >Creative Tim</a
              >, made with <i class="fa fa-heart heart"></i> for a better web
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
      let images = {
        Welcome: "./img/bg-pricing.jpg",
        Login: "./img/login.jpg",
        Register: "./img/register.jpg",
        Lock: "./img/lock.jpg"
      };
      return {
        backgroundImage: `url(${images[this.$route.name]})`
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
    }
  },
  mounted() {
      console.log($auth.check());
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
