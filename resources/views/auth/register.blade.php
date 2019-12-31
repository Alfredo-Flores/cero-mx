@extends('layouts.app')

@section('content')
    <div class="md-layout">
        <div class="md-layout-item md-size-66 md-xsmall-size-80 mx-auto">
            <simple-wizard title="Registro" sub-title="Se parte de una gran comunidad">
                <wizard-tab :before-change="() => validateStep('step1')">
                    <template slot="label">
                        Representante
                    </template>
                    <first-step ref="step1" @on-validated="onStepValidated" @on-info="changeInfo"></first-step>
                </wizard-tab>

                <wizard-tab :before-change="() => validateStep('step2')">
                    <template slot="label">
                        Tipo de organización
                    </template>
                    <second-step ref="step2"  @on-validated="onStepValidated" @on-type="changeType"></second-step>
                </wizard-tab>

                <wizard-tab :before-change="() => validateStep('step3')">
                    <template slot="label">
                        Info de organización
                    </template>
                    <empresa-step v-if="type == 1" ref="step3" @on-validated="wizardComplete"></empresa-step>
                    <organizacion-step v-if="type == 2" ref="step3" @on-validated="wizardComplete"></organizacion-step>
                    <internacional-step v-if="type == 3" ref="step3" @on-validated="wizardComplete"></internacional-step>
                </wizard-tab>
            </simple-wizard>
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
                    wizardModel: {},
                    type: null,
                    responsive: false,
                    representantlogo: "",
                    representantname: "",
                    representanttel: "",
                    representantemail: "",
                    representantpass: "",
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
                validateStep(ref) {
                    return this.$refs[ref].validate();
                },
                onStepValidated(validated, model) {
                    this.wizardModel = { ...this.wizardModel, ...model };
                },
                changeInfo(logo, name, phone, email, pass) {
                    this.representantlogo = logo;
                    this.representantname = name;
                    this.representanttel = phone;
                    this.representantemail = email;
                    this.representantpass = pass;

                    console.log("Nice");
                },
                changeType(type) {
                    this.type = type;

                    console.log("ulala");
                },
                wizardComplete() {

                },
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
