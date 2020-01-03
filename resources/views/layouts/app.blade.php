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
            <md-toolbar md-elevation="0" class="md-transparent md-toolbar-absolute">
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
                                <md-list-item href="/">
                                    <md-icon>house</md-icon>
                                    Bienvenida
                                </md-list-item>
                                @guest
                                <md-list-item href="/register">
                                    <md-icon>person_add</md-icon>
                                    Registro
                                </md-list-item>
                                <md-list-item href="/login">
                                    <md-icon>fingerprint</md-icon>
                                    Entrar
                                </md-list-item>
                                @else
                                    <md-list-item href="/">
                                        <md-icon>fingerprint</md-icon>
                                        Administrar
                                    </md-list-item>

                                    <md-list-item href="{{ route('logout') }}" @click="document.getElementById('logout-form').submit()">
                                        <md-icon>door</md-icon>
                                        Salir
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

                    <div class="container md-offset">
                        @yield('content')
                    </div>

                    <footer class="footer">
                        <div class="container md-offset">
                            <div class="copyright text-center">
                                &copy; @{{ new Date().getFullYear() }}
                                <a href="https://www.creative-tim.com/?ref=mdp-vuejs" target="_blank"
                                >Magnimus Software</a
                                >, derechos reservados
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </div>

    @stack('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
