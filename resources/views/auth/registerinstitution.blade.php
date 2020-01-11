@extends('layouts.app')

@section('content')
    <div class="md-layout">
        <div class="md-layout-item md-size-75 md-xsmall-size-80 mx-auto">
            <simple-wizard title="{{ __("register.title") }}" next-button-text="{{ __("register.next") }}" prev-button-text="{{ __("register.prev") }}" finish-button-text="{{ __("register.finish") }}">
                <wizard-tab :before-change="() => validateStep('step1')">
                    <template slot="label">
                        {{ __("register.first_card_title") }}
                    </template>
                    <first-step ref="step1" @on-info="changeInfo"></first-step>
                </wizard-tab>

                <wizard-tab :before-change="() => validateStep('step2')">
                    <template slot="label">
                        {{ __("register.second_card_title") }}
                    </template>
                    <second-step ref="step2" @on-type="changeType"></second-step>
                </wizard-tab>

                <wizard-tab :before-change="() => validateStep('step3')">
                    <template slot="label">
                        {{ __("register.third_card_title") }}
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
            data() {
                return {
                    type: 0,

                    representantenombre: "",
                    representanteprimerapellido: "",
                    representantesegundoapellido: "",
                    representantecurp: "",
                    representanterfc: "",
                    representantecorreolaboral: "",
                    representantecorreopersonal: "",
                    representantenacionalidad: "",
                    representantelugarnacio: "",
                    representantelocalidad: "",
                    representantedomicilio: "",
                    representantemunicipio: "",
                    representanteentidadfederativa: "",
                    representantecodigo: "",
                    representantetelefonofijo: "",
                    representantetelefonomovil: "",
                    representantefoto: "",
                    representantecorreocuenta: "",
                    representantepass: "",

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
            methods: {
                validateStep(ref) {
                    return this.$refs[ref].validate();
                },
                changeInfo(nombre, primerapellido, segundoapellido, curp, rfc, correolaboral, correopersonal, nacionalidad, lugarnacio, localidad, domicilio, municipio, entidadfederativa, codigo, telefonofijo, telefonomovil, foto, correocuenta, pass) {
                    this.representantenombre = nombre;
                    this.representanteprimerapellido = primerapellido;
                    this.representantesegundoapellido = segundoapellido;
                    this.representantecurp = curp;
                    this.representanterfc = rfc;
                    this.representantecorreolaboral = correolaboral;
                    this.representantecorreopersonal = correopersonal;
                    this.representantenacionalidad = nacionalidad;
                    this.representantelugarnacio = lugarnacio;
                    this.representantelocalidad = localidad;
                    this.representantedomicilio = domicilio;
                    this.representantemunicipio = municipio;
                    this.representanteentidadfederativa = entidadfederativa;
                    this.representantecodigo = codigo;
                    this.representantetelefonofijo = telefonofijo;
                    this.representantetelefonomovil = telefonomovil;
                    this.representantefoto = foto;
                    this.representantecorreocuenta = correocuenta;
                    this.representantepass = pass;
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

                    let uri = '{{ route('register') }}';

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

                    let uri = '{{ route('register') }}';

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

                    let uri = '{{ route('register') }}';

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
            },
        };

        window.pageMix.push(mixLogin);
    </script>
@endpush