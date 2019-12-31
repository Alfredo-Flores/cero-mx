@extends('layouts.app')

@section('content')
    <div class="md-layout text-center">
        <div
            class="md-layout-item md-size-33 md-medium-size-50 md-small-size-70 md-xsmall-size-100"
        >
            <login-card header-color="green">
                <h4 slot="title" class="title">Entrar a la administración</h4>
                <md-field class="md-form-group" slot="inputs">
                    <md-icon>email</md-icon>
                    <label>Correo Electronico</label>
                    <md-input v-model="email" type="email"></md-input>
                </md-field>
                <md-field class="md-form-group" slot="inputs">
                    <md-icon>lock_outline</md-icon>
                    <label>Contraseña</label>
                    <md-input v-model="password"></md-input>
                </md-field>
                <md-button slot="footer" class="md-simple md-success md-lg">
                    Entrar
                </md-button>
            </login-card>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        let mixLogin = {
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
                    firstname: null,
                    email: null,
                    password: null,
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

        window.pageMix.push(mixLogin);
    </script>
@endpush


