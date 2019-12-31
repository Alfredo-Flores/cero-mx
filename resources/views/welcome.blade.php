@extends('layouts.app')

@section('content')
    <div>
        <div class="md-layout">
            <div class="md-layout-item md-size-100 mx-auto text-center">
                <h2 class="title">Bienvenido</h2>
                <h5 class="description">
                    Se parte de esta gran comunidad
                </h5>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        let mixAppLayout = {
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

        window.pageMix.push(mixAppLayout);
    </script>
@endpush

