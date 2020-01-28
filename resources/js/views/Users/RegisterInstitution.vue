<template>
    <div class="md-layout">
        <div class="md-layout-item md-size-75 md-xsmall-size-80 mx-auto">
            <simple-wizard title="Registro de Institución" next-button-text="Siguiente" prev-button-text="Anterior" finish-button-text="Registrar">
            <wizard-tab :before-change="() => validateStep('step1')">
                <template slot="label">
                    Representante
                </template>
                <first-step ref="step1" @on-info="changeInfo"></first-step>
            </wizard-tab>

            <wizard-tab :before-change="() => validateStep('step2')">
                <template slot="label">
                    Tipo de instituciónn
                </template>
                <second-step ref="step2" @on-type="changeType"></second-step>
            </wizard-tab>

            <wizard-tab :before-change="() => validateStep('step3')">
                <template slot="label">
                    Información de la institución
                </template>
                <empresa-step v-if="type === 1" ref="step3" @on-empresa="changeEmpresa"></empresa-step>
                <organizacion-step v-if="type === 2" ref="step3" @on-organizacion="changeOrganizacion"></organizacion-step>
            </wizard-tab>
            </simple-wizard>
        </div>
    </div>
</template>

<script>
    import FirstStep from "../../components/Wizard/Steps/FirstStep.vue";
    import SecondStep from "../../components/Wizard/Steps/SecondStep.vue";
    import OrganizacionStep from "../../components/Wizard/Steps/OrganizacionStep.vue";
    import EmpresaStep from "../../components/Wizard/Steps/EmpresaStep.vue";
    import Swal from "sweetalert2";
    import SimpleWizard from "../../components/Wizard/Wizard.vue";
    import WizardTab from "../../components/Wizard/WizardTab.vue";

    export default {
        components: {
            FirstStep,
            SecondStep,
            OrganizacionStep,
            EmpresaStep,
            SimpleWizard,
            WizardTab
        },
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
                representantepais: "",
                representantecodigo: "",
                representantetelefonofijo: "",
                representantetelefonomovil: "",
                representantefoto: "",
                representantecorreocuenta: "",
                representantepass: "",

                empresanombre: "",
                empresalogo: "",
                empresadireccion: "",
                empresalocalidad: "",
                empresamunicipio: "",
                empresaentidad: "",
                empresapais: "",
                empresacodigo: "",
                empresatributante: "",
                empresagiro: "",
                empresatelefonooficina: "",
                empresacorreooficina: "",
                empresadescrpicionalimentos: "",
                empresacantidaddonacion: "",
                empresatiempoconsumo: "",
                empresahoraentrega: "",
                empresadetallesentrega: "",

                organizacionsegmentomercado: "",
                organizacionbeneficiossemanales: "",
                organizacionnombre: "",
                organizacionlogo: "",
                organizacionrfc: "",
                organizaciondomicilio: "",
                organizacionlocalidad: "",
                organizacionmunicipio: "",
                organizacionentidad: "",
                organizacionpais: "",
                organizacioncodigo: "",
                organizaciontelefonooficina: "",
                organizacioncorreooficina: "",
                organizacionplananual: "",
                organizacionactaconstitutiva: "",
                organizacionconstanciadonatoria: "",

            };
        },
        methods: {
            validateStep(ref) {
                return this.$refs[ref].validate();
            },
            changeInfo(nombre, primerapellido, segundoapellido, curp, rfc, correolaboral, correopersonal, nacionalidad, pais, lugarnacio, localidad, domicilio, municipio, entidadfederativa, codigo, telefonofijo, telefonomovil, foto) {
                this.representantenombre = nombre;
                this.representanteprimerapellido = primerapellido;
                this.representantesegundoapellido = segundoapellido;
                this.representantecurp = curp;
                this.representanterfc = rfc;
                this.representantecorreolaboral = correolaboral;
                this.representantecorreopersonal = correopersonal;
                this.representantenacionalidad = nacionalidad;
                this.representantepais = pais;
                this.representantelugarnacio = lugarnacio;
                this.representantelocalidad = localidad;
                this.representantedomicilio = domicilio;
                this.representantemunicipio = municipio;
                this.representanteentidadfederativa = entidadfederativa;
                this.representantecodigo = codigo;
                this.representantetelefonofijo = telefonofijo;
                this.representantetelefonomovil = telefonomovil;
                this.representantefoto = foto;
            },
            changeEmpresa(nombre, direccion, localidad, municipio, entidad, pais, codigopostal, rfc, giro, telefonooficina, correooficina, descripcionalimentos, cantidaddonacion, tiempoconsumo, horarioentrega, detallesentrega, logo) {
                this.empresanombre = nombre;
                this.empresalogo = logo;
                this.empresadireccion = direccion;
                this.empresalocalidad = localidad;
                this.empresamunicipio = municipio;
                this.empresaentidad = entidad;
                this.empresapais = pais;
                this.empresacodigo = codigopostal;
                this.empresatributante = rfc;
                this.empresagiro = giro;
                this.empresatelefonooficina = telefonooficina;
                this.empresacorreooficina = correooficina;
                this.empresadescrpicionalimentos = descripcionalimentos;
                this.empresacantidaddonacion = cantidaddonacion;
                this.empresatiempoconsumo = tiempoconsumo;
                this.empresahoraentrega = horarioentrega;
                this.empresadetallesentrega = detallesentrega;

                var formData = new FormData();

                formData.append("Nombre", this.representantenombre);
                formData.append("PrimerApellido", this.representanteprimerapellido);
                formData.append("SegundoApellido", this.representantesegundoapellido);
                formData.append("Curp", this.representantecurp);
                formData.append("Rfc", this.representanterfc);
                formData.append("CorreoLaboral", this.representantecorreolaboral);
                formData.append("CorreoPersonal", this.representantecorreopersonal);
                formData.append("Nacionalidad", this.representantenacionalidad);
                formData.append("Pais", this.representantepais);
                formData.append("EntidadFed", this.representanteentidadfederativa);
                formData.append("Municipio", this.representantemunicipio);
                formData.append("Localidad", this.representantelocalidad);
                formData.append("Domicilio", this.representantedomicilio);
                formData.append("Codigo", this.representantecodigo);
                formData.append("TelFijo", this.representantetelefonofijo);
                formData.append("TelMovil", this.representantetelefonomovil);
                formData.append("Foto", this.representantefoto);

                formData.append("TipoInstitucion", this.type);
                formData.append("Id", this.$auth.user().Id);

                formData.append("EmpresaNombre", this.empresanombre);
                formData.append("EmpresaLogo", this.empresalogo);
                formData.append("EmpresaDireccion", this.empresadireccion);
                formData.append("EmpresaLocalidad", this.empresalocalidad);
                formData.append("EmpresaMunicipio", this.empresamunicipio);
                formData.append("EmpresaEntidad", this.empresaentidad);
                formData.append("EmpresaPais", this.empresapais);
                formData.append("EmpresaCodigo", this.empresacodigo);
                formData.append("EmpresaTributante", this.empresatributante);
                formData.append("EmpresaGiro", this.empresagiro);
                formData.append("EmpresaTelOficina", this.empresatelefonooficina);
                formData.append("EmpresaCorreoOficina", this.empresacorreooficina);
                formData.append("EmpresaDescripAli", this.empresadescrpicionalimentos);
                formData.append("EmpresaCantDonacion", this.empresacantidaddonacion);
                formData.append("EmpresaTiempoConsumo", this.empresatiempoconsumo);
                formData.append("EmpresaHoraEntrega", this.empresahoraentrega);
                formData.append("EmpresaDetallesEntrega", this.empresadetallesentrega);

                let uri = 'auth/registerinstitution';

                axios.post(uri, formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data',
                'Access-Control-Allow-Headers': 'Authorization',
                'Access-Control-Expose-Headers': 'Authorization',
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
            changeOrganizacion(segmentomercado, beneficiossemanales, nombre, logo, rfc, domicilio, localidad, municipio, entidad, pais, codigo, telefonooficina, correooficina, plananual, actaconstitutiva, constanciadonatoria) {
                this.organizacionsegmentomercado = segmentomercado;
                this.organizacionbeneficiossemanales = beneficiossemanales;
                this.organizacionnombre = nombre;
                this.organizacionlogo = logo;
                this.organizacionrfc = rfc;
                this.organizaciondomicilio = domicilio;
                this.organizacionlocalidad = localidad;
                this.organizacionmunicipio = municipio;
                this.organizacionentidad = entidad;
                this.organizacionpais = pais;
                this.organizacioncodigo = codigo;
                this.organizaciontelefonooficina = telefonooficina;
                this.organizacioncorreooficina = correooficina;
                this.organizacionplananual = plananual;
                this.organizacionactaconstitutiva = actaconstitutiva;
                this.organizacionconstanciadonatoria = constanciadonatoria;

                var formData = new FormData();

                formData.append("Nombre", this.representantenombre);
                formData.append("PrimerApellido", this.representanteprimerapellido);
                formData.append("SegundoApellido", this.representantesegundoapellido);
                formData.append("Curp", this.curp);
                formData.append("Rfc", this.representanterfc);
                formData.append("CorreoLaboral", this.representantecorreolaboral);
                formData.append("CorreoPersonal", this.representantecorreopersonal);
                formData.append("Nacionalidad", this.representantenacionalidad);
                formData.append("Pais", this.representantepais);
                formData.append("EntidadFed", this.representanteentidadfederativa);
                formData.append("Municipio", this.representantemunicipio);
                formData.append("Localidad", this.representantelocalidad);
                formData.append("Domicilio", this.representantedomicilio);
                formData.append("Codigo", this.representantecodigo);
                formData.append("TelFijo", this.representantetelefonofijo);
                formData.append("TelMovil", this.representantetelefonomovil);
                formData.append("Foto", this.representantefoto);

                formData.append("TipoInstitucion", this.type);
                formData.append("Id", this.$auth.user().Id);

                formData.append("OrganizacionNombre", this.organizacionnombre);
                formData.append("OrganizacionLogo", this.organizacionlogo);
                formData.append("OrganizacionDomicilio", this.organizaciondomicilio);
                formData.append("OrganizacionLocalidad", this.organizacionlocalidad);
                formData.append("OrganizacionMunicipio", this.organizacionmunicipio);
                formData.append("OrganizacionEntidad", this.organizacionentidad);
                formData.append("OrganizacionPais", this.organizacionpais);
                formData.append("OrganizacionCodigo", this.organizacioncodigo);
                formData.append("OrganizacionRfc", this.organizacionrfc);
                formData.append("OrganizacionTelOficina", this.organizaciontelefonooficina);
                formData.append("OrganizacionCorreoOficina", this.organizacioncorreooficina);
                formData.append("OrganizacionSegmentoMercado", this.organizacionsegmentomercado);
                formData.append("OrganizacionBenefSemana", this.organizacionbeneficiossemanales);
                formData.append("OrganizacionPlanAnual", this.organizacionplananual);
                formData.append("OrganizacionActaConstitutiva", this.organizacionactaconstitutiva);
                formData.append("OrganizacionConstanciaDonataria", this.organizacionconstanciadonatoria);

                let uri = 'auth/registerinstitution';

                axios.post(uri, formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data',
                            'Access-Control-Allow-Headers': 'Authorization',
                            'Access-Control-Expose-Headers': 'Authorization',
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
    }
</script>

