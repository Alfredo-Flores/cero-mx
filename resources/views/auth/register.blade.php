@extends('layouts.app')

@section('content')
    <div class="md-layout">
        <div class="md-layout-item md-size-66 md-xsmall-size-80 mx-auto">
            <simple-wizard title="Registro" sub-title="Se parte de una gran comunidad" next-button-text="Siguiente" prev-button-text="Anterior" finish-button-text="Registrar">
                <wizard-tab :before-change="() => validateStep('step1')">
                    <template slot="label">
                        Representante
                    </template>
                    <first-step ref="step1" @on-info="changeInfo"></first-step>
                </wizard-tab>

                <wizard-tab :before-change="() => validateStep('step2')">
                    <template slot="label">
                        Tipo de organización
                    </template>
                    <second-step ref="step2" @on-type="changeType"></second-step>
                </wizard-tab>

                <wizard-tab :before-change="() => validateStep('step3')">
                    <template slot="label">
                        Info de organización
                    </template>
                    <empresa-step v-if="type === 1" ref="step3" @on-empresa="changeEmpresa"></empresa-step>
                    <organizacion-step v-if="type === 2" ref="step3" @on-organizacion="changeOrganizacion"></organizacion-step>
                    <internacional-step v-if="type === 3" ref="step3" @on-internacional="changeInternacional"></internacional-step>
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
                    type: 0,
                    responsive: false,
                    representantlogo: "",
                    representantname: "",
                    representanttel: "",
                    representantemail: "",
                    representantpass: "",
                    bussinessname: "",
                    bussinessdirection: "",
                    bussinesstel: "",
                    bussinessrfc: "",
                    organizationname: "",
                    organizationdirection: "",
                    organizationtelphone: "",
                    cluni: "",
                    constanciadonatoria: "",
                    organizationrfc: "",
                    internacionalname: "",
                    internacionaldirection: "",
                    internacionaltel: "",
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
                changeInfo(logo, name, phone, email, pass) {
                    this.representantname = name;
                    this.representantlogo = logo;
                    this.representanttel = phone;
                    this.representantemail = email;
                    this.representantpass = pass;
                },
                changeEmpresa(name, direction, phone, rfc) {
                    this.bussinessname = name;
                    this.bussinessdirection = direction;
                    this.bussinesstel = phone;
                    this.bussinessrfc = rfc;

                    var formData = new FormData();

                    formData.append("token", '@csrf');
                    formData.append("NombreRepresentante", this.representantname);
                    formData.append("TelefonoRepresentante", this.representanttel);
                    formData.append("LogoInstitucion", this.representantlogo);
                    formData.append("Email", this.representantemail);
                    formData.append("Password", this.representantpass);
                    formData.append("TipoDeInstitucion", this.type);
                    formData.append("NombreEmpresa", this.bussinessname);
                    formData.append("DireccionEmpresa", this.bussinessdirection);
                    formData.append("TelefonoEmpresa", this.bussinesstel);
                    formData.append("RfcEmpresa", this.bussinessrfc);

                    let uri = '/registerUser';

                    axios.post(uri, formData,
                        {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        }).then(response => {
                        if (response.data.success) {
                            this.$toastr.Add({
                                title: "Registrado Correctamente", // Toast Title
                                msg: response.data.message, // Toast Message
                                type: "success", // Toast type,
                                preventDuplicates: true, //Default is false,
                                onClosed: ()=>{
                                    window.location.replace("/");
                                },
                            });
                        } else {
                            this.$toastr.e(response.data.message, 'Error');
                        }
                    });
                },
                changeOrganizacion(name, direction, telphone, cluni, constanciadonatoria, rfc) {
                    this.organizationname = name;
                    this.organizationdirection = direction;
                    this.organizationtelphone = telphone;
                    this.cluni = cluni;
                    this.constanciadonatoria = constanciadonatoria;
                    this.organizationrfc = rfc;

                    var formData = new FormData();

                    formData.append("token", '@csrf');
                    formData.append("NombreRepresentante", this.representantname);
                    formData.append("TelefonoRepresentante", this.representanttel);
                    formData.append("LogoInstitucion", this.representantlogo);
                    formData.append("Email", this.representantemail);
                    formData.append("Password", this.representantpass);
                    formData.append("TipoDeInstitucion", this.type);
                    formData.append("NombreOrganizacion", this.organizationname);
                    formData.append("DireccionOrganizacion", this.organizationdirection);
                    formData.append("TelefonoOrganizacion", this.organizationtelphone);
                    formData.append("Cluni", this.cluni);
                    formData.append("Constancia", this.constanciadonatoria);
                    formData.append("RfcOrganizacion", this.organizationrfc);

                    let uri = '/registerUser';

                    axios.post(uri, formData,
                        {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }).then(response => {
                        if (response.data.success) {
                            this.$toastr.Add({
                                title: "Registrado Correctamente", // Toast Title
                                msg: response.data.message, // Toast Message
                                type: "success", // Toast type,
                                preventDuplicates: true, //Default is false,
                                onClosed: ()=>{
                                    window.location.replace("/");
                                },
                            });
                        } else {
                            this.$toastr.e(response.data.message, 'Error');
                        }
                    });
                },
                changeInternacional(name, direction, phone) {
                    this.internacionalname = name;
                    this.internacionaldirection = direction;
                    this.internacionaltel = phone;

                    var formData = new FormData();

                    formData.append("token", '@csrf');
                    formData.append("NombreRepresentante", this.representantname);
                    formData.append("TelefonoRepresentante", this.representanttel);
                    formData.append("LogoInstitucion", this.representantlogo);
                    formData.append("Email", this.representantemail);
                    formData.append("Password", this.representantpass);
                    formData.append("TipoDeInstitucion", this.type);
                    formData.append("NombreInternacional", this.internacionalname);
                    formData.append("DireccionInternacional", this.internacionaldirection);
                    formData.append("TelefonoInternacional", this.internacionaltel);

                    let uri = '/registerUser';

                    axios.post(uri, formData,
                        {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        }).then(response => {
                        if (response.data.success) {
                            this.$toastr.Add({
                                title: "Registrado Correctamente", // Toast Title
                                msg: response.data.message, // Toast Message
                                type: "success", // Toast type,
                                preventDuplicates: true, //Default is false,
                                onClosed: ()=>{
                                    window.location.replace("/");
                                },
                            });
                        } else {
                            this.$toastr.e(response.data.message, 'Error');
                        }
                    });
                },
                changeType(type) {
                    this.type = type;
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
