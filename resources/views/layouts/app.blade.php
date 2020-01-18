<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/pagemix.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,500,700,400italic|Material+Icons">
    <link rel="stylesheet"
          href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
          integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ"
          crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="full-page" :class="{ 'nav-open': $sidebar.showSidebar }">
            <md-toolbar md-elevation="8" class="md-primary md-toolbar-absolute md-absolute">
                <div class="md-toolbar-row md-offset">
                    <div class="md-toolbar-section-start">
                        <h3 class="md-title">{{ config('app.name', 'Laravel') }}</h3>
                    </div>
                    <div class="md-toolbar-section-end">
                        <md-button
                            class="md-just-icon md-simple md-round md-toolbar-toggle"
                            :class="{ toggled: $sidebar.showSidebar }"
                            @click="toggleSidebar"
                        >
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </md-button>

                        <div
                            class="md-collapse"
                            :class="{ 'off-canvas-sidebar': responsive }"
                        >
                            <md-list>
                                <md-list-item href="{{ route('index') }}">
                                    <md-icon>house</md-icon>
                                    {{ __('app.index') }}
                                </md-list-item>
                                @guest
                                <md-list-item @click="loadPageSection('{{route('registerview')}}','contenedor', )" >
                                    <md-icon>person_add</md-icon>
                                    {{ __('app.register') }}
                                </md-list-item>
                                <md-list-item href="{{ route('loginview') }}">
                                    <md-icon>fingerprint</md-icon>
                                    {{ __('app.login') }}
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

                                @if(Auth::user()->isinstitution)
                                        <md-list-item href="{{ route("Tblentdnc.main") }}">
                                            <md-icon>dashboard</md-icon>
                                            Administración
                                        </md-list-item>
                                    @else
                                        <md-list-item href="{{ route("registeradvancedview") }}">
                                            <md-icon>person_add</md-icon>
                                            Registro de institución
                                        </md-list-item>
                                    @endif


                                    <md-list-item href="{{ route('logout') }}" onclick="document.getElementById('logout-form').submit()">
                                        <md-icon>exit_to_app</md-icon>
                                        {{ __('app.logout') }}
                                    </md-list-item>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                @endguest
                            </md-list>
                        </div>
                    </div>
                </div>
            </md-toolbar>

            <div class="wrapper wrapper-full-page" @click="toggleSidebarPage">
                <div
                    class="page-header header-filter"
                    filter-color="black"
                    :style="setBgImage"
                >

                    <div class="container md-offset" id="contenedor">
                        @yield('content')
                    </div>

                    <footer class="footer bg-dark" style="margin-top: 1000px !important;">
                        <div class="container md-offset">
                            <div class="md-layout">
                                <div
                                    class="md-layout-item md-size-20 md-xsmall-size-100"
                                >
                                    <div class="copyright text-center h6">
                                        &copy; {{ date("Y") }}
                                        <a href="http://www.magnimussoftware.com/" target="_blank"
                                        >Magnimus Software</a
                                        >, {{ __('app.copyright') }}

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
                </div>
            </div>
        </div>
    </div>

    @stack('scripts')
    <script>
        let mix = {
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
                };
            },
            computed: {
                setBgImage() {
                    return {
                        backgroundImage: `url(/img/bg-pricing.jpg)`
                    };
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
               loadPageSection(url, selector){
                    if (typeof url !== 'string') {
                        throw new Error('Invalid URL: ', url);
                    } else if (typeof selector !== 'string') {
                        throw new Error('Invalid selector selector: ', selector);
                    }
                    fetch(url)
                   .then(function (response) {
                       return response.text()
                   })
                   .then(function (body) {
                        document.querySelector('#'+selector).innerHTML = body;
                        app.$forceUpdate();

                   })
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

        window.pageMix.push(mix);
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
