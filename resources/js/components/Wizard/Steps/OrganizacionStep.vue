<template>
    <ValidationObserver ref="form">
        <form @submit.prevent="validate">
            <div>
                <h6 class="info-text">
                    Por favor, llene los siguientes formularios, * significa que es obligatorio
                </h6>
                <div class="md-layout">
                    <div class="md-layout-item md-size-100 md-small-size-100">
                        <div class="picture-container">
                            <div class="picture">
                                <div v-if="!image">
                                    <img :src="avatar" class="picture-src" title=""/>
                                </div>
                                <div v-else>
                                    <img :src="image"/>
                                </div>
                                <input type="file" @change="onFileChange"/>
                            </div>
                            <h6 class="description">Logo de la organización <p style="color: red">*</p></h6>
                        </div>
                    </div>
                    <div class="md-layout-item md-size-50 md-small-size-100">
                        <ValidationProvider
                            name="nombre"
                            rules="required"
                            v-slot="{ passed, failed }"
                        >
                            <md-field
                                :class="[
                  { 'md-error': failed },
                  { 'md-valid': passed },
                  { 'md-form-group': true }
                ]"
                            >
                                <md-icon>title</md-icon>
                                <label>Nombre, Denominacion o Razon Social</label>
                                <p style="color: red">*</p>
                                <md-input v-model="nombre" type="text"></md-input>
                                <md-icon class="error" v-show="failed">close</md-icon>
                                <md-icon class="success" v-show="passed">done</md-icon>
                            </md-field>
                        </ValidationProvider>

                        <ValidationProvider
                            name="pais"
                            rules="required"
                            v-slot="{ passed, failed }"
                        >
                            <md-field
                                :class="[
                  { 'md-error': failed },
                  { 'md-valid': passed },
                  { 'md-form-group': true }
                ]"
                            >
                                <md-icon>emoji_flags</md-icon>
                                <label>Pais</label>
                                <p style="color: red">*</p>
                                <md-select v-model="pais" class="ml-1">
                                    <md-option value="Mexico">México</md-option>
                                </md-select>
                            </md-field>
                        </ValidationProvider>

                        <ValidationProvider
                            name="pais"
                            rules="required"
                            v-slot="{ passed, failed }"
                        >
                            <md-field
                                :class="[
                  { 'md-error': failed },
                  { 'md-valid': passed },
                  { 'md-form-group': true }
                ]"
                            >
                                <md-icon>emoji_flags</md-icon>
                                <label>Entidad Federativa</label>
                                <p style="color: red">*</p>
                                <md-select v-model="entidad" class="ml-1">
                                    <md-option value="Mexicano">Mexicano</md-option>
                                </md-select>
                            </md-field>
                        </ValidationProvider>

                        <ValidationProvider
                            name="municipio"
                            rules="required"
                            v-slot="{ passed, failed }"
                        >
                            <md-field
                                :class="[
                  { 'md-error': failed },
                  { 'md-valid': passed },
                  { 'md-form-group': true }
                ]"
                            >
                                <md-icon>gps_fixed</md-icon>
                                <label>Municipio</label>
                                <p style="color: red">*</p>
                                <md-input v-model="municipio" type="text"></md-input>
                                <md-icon class="error" v-show="failed">close</md-icon>
                                <md-icon class="success" v-show="passed">done</md-icon>
                            </md-field>

                        </ValidationProvider>

                        <ValidationProvider
                            name="domicilio"
                            rules="required"
                            v-slot="{ passed, failed }"
                        >
                            <md-field
                                :class="[
                  { 'md-error': failed },
                  { 'md-valid': passed },
                  { 'md-form-group': true }
                ]"
                            >
                                <md-icon>gps_fixed</md-icon>
                                <label>Calle, Numero Exterior y/o Interior</label>
                                <p style="color: red">*</p>
                                <md-input v-model="domicilio" type="text"></md-input>
                                <md-icon class="error" v-show="failed">close</md-icon>
                                <md-icon class="success" v-show="passed">done</md-icon>
                            </md-field>
                        </ValidationProvider>

                        <ValidationProvider
                            name="localidad"
                            rules="required"
                            v-slot="{ passed, failed }"
                        >
                            <md-field
                                :class="[
                  { 'md-error': failed },
                  { 'md-valid': passed },
                  { 'md-form-group': true }
                ]"
                            >
                                <md-icon>gps_fixed</md-icon>
                                <label>Localidad o colonia</label>
                                <p style="color: red">*</p>
                                <md-input v-model="localidad" type="text"></md-input>
                                <md-icon class="error" v-show="failed">close</md-icon>
                                <md-icon class="success" v-show="passed">done</md-icon>
                            </md-field>
                        </ValidationProvider>

                        <ValidationProvider
                            name="codigo"
                            rules="required|integer"
                            v-slot="{ passed, failed }"
                        >
                            <md-field
                                :class="[
                  { 'md-error': failed },
                  { 'md-valid': passed },
                  { 'md-form-group': true }
                ]"
                            >
                                <md-icon>info</md-icon>
                                <label>Codigo Postal</label>
                                <p style="color: red">*</p>
                                <md-input v-model="codigo" type="text"></md-input>
                                <md-icon class="error" v-show="failed">close</md-icon>
                                <md-icon class="success" v-show="passed">done</md-icon>
                            </md-field>
                        </ValidationProvider>
                    </div>

                    <div class="md-layout-item md-size-50 md-small-size-100">
                        <ValidationProvider
                            name="rfc"
                            rules="required|rfc"
                            v-slot="{ passed, failed }"
                        >
                            <md-field
                                :class="[
                  { 'md-error': failed },
                  { 'md-valid': passed },
                  { 'md-form-group': true }
                ]"
                            >
                                <md-icon>info</md-icon>
                                <label>RFC</label>
                                <p style="color: red">*</p>
                                <md-input v-model="rfc" type="text"></md-input>
                                <md-icon class="error" v-show="failed">close</md-icon>
                                <md-icon class="success" v-show="passed">done</md-icon>
                            </md-field>
                        </ValidationProvider>

                        <ValidationProvider
                            name="telefonooficina"
                            rules="required|integer|min:10"
                            v-slot="{ passed, failed }"
                        >
                            <md-field
                                :class="[
                  { 'md-error': failed },
                  { 'md-valid': passed },
                  { 'md-form-group': true }
                ]"
                            >
                                <md-icon>call</md-icon>
                                <label>Telefono de Oficina</label>
                                <p style="color: red">*</p>
                                <md-input v-model="telefonooficina" type="text"></md-input>
                                <md-icon class="error" v-show="failed">close</md-icon>
                                <md-icon class="success" v-show="passed">done</md-icon>
                            </md-field>
                        </ValidationProvider>

                        <ValidationProvider
                            name="correooficina"
                            rules="required|email"
                            v-slot="{ passed, failed }"
                        >
                            <md-field
                                :class="[
                  { 'md-error': failed },
                  { 'md-valid': passed },
                  { 'md-form-group': true }
                ]"
                            >
                                <md-icon>email</md-icon>
                                <label>Correo de Oficina</label>
                                <p style="color: red">*</p>
                                <md-input v-model="correooficina" type="text"></md-input>
                                <md-icon class="error" v-show="failed">close</md-icon>
                                <md-icon class="success" v-show="passed">done</md-icon>
                            </md-field>
                        </ValidationProvider>

                        <ValidationProvider
                            name="segmentomercado"
                            rules=""
                            v-slot="{ passed, failed }"
                        >
                            <md-field
                                :class="[
                  { 'md-error': failed },
                  { 'md-valid': passed },
                  { 'md-form-group': true }
                ]"
                            >
                                <md-icon>info</md-icon>
                                <label>Grupos vulnerables a atender</label>
                                <p style="color: red">*</p>
                                <md-input v-model="segmentomercado" type="text"></md-input>
                                <md-icon class="error" v-show="failed">close</md-icon>
                                <md-icon class="success" v-show="passed">done</md-icon>
                            </md-field>
                        </ValidationProvider>

                        <ValidationProvider
                            name="beneficiossemanales"
                            rules=""
                            v-slot="{ passed, failed }"
                        >
                            <md-field
                                :class="[
                  { 'md-error': failed },
                  { 'md-valid': passed },
                  { 'md-form-group': true }
                ]"
                            >
                                <md-icon>info</md-icon>
                                <label>Beneficiarios por semana</label>
                                <p style="color: red">*</p>
                                <md-input v-model="beneficiossemanales" type="numeric"></md-input>
                                <md-icon class="error" v-show="failed">close</md-icon>
                                <md-icon class="success" v-show="passed">done</md-icon>
                            </md-field>
                        </ValidationProvider>

                        <md-field
                            :class="[
                  { 'md-form-group': true }
                ]"
                        >
                            <label>Plan de trabajo anual</label>
                            <p style="color: red">*</p>
                            <md-file @change="changePlananual"></md-file>
                        </md-field>

                        <md-field
                            :class="[
                  { 'md-form-group': true }
                ]"
                        >
                            <label>Acta constitutiva</label>
                            <p style="color: red">*</p>
                            <md-file @change="changeActaconstitutiva"></md-file>
                        </md-field>

                        <md-field
                            :class="[
                  { 'md-form-group': true }
                ]"
                        >
                            <label>Constancia donatoria</label>
                            <p style="color: red">*</p>
                            <md-file @change="changeConstanciadonatoria"></md-file>
                        </md-field>
                    </div>
                </div>
            </div>
        </form>
    </ValidationObserver>
</template>
<script>
    import {extend} from "vee-validate";
    import {required, min, max, integer} from "vee-validate/dist/rules";

    extend("required", required);
    extend("min", min);
    extend("max", max);
    extend("integer", integer);

    extend("rfc", {
        validate: (value) => {
            const re = /^([A-ZÑ&]{3,4}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/;
            return value.match(re);
        }
    });

    extend("curp", {
        validate: (value) => {
            const re = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/;
            return value.match(re);
        }
    });

    export default {
        props: {
            avatar: {
                type: String,
                default: "./img/default-avatar.png"
            }
        },
        data() {
            return {
                image: "",

                segmentomercado: "",
                beneficiossemanales: "",
                nombre: "",
                logo: "",
                rfc: "",
                domicilio: "",
                localidad: "",
                municipio: "",
                entidad: "",
                pais: "",
                codigo: "",
                telefonooficina: "",
                correooficina: "",
                plananual: "",
                actaconstitutiva: "",
                constanciadonatoria: "",
            };
        },
        methods: {
            handlePreview(file) {
                this.model.imageUrl = URL.createObjectURL(file.raw);
            },
            onFileChange(e) {
                var files = e.target.files || e.dataTransfer.files;
                if (!files.length) return;

                this.logo = files[0];

                this.createImage(files[0]);
            },
            createImage(file) {
                var reader = new FileReader();
                var vm = this;

                reader.onload = e => {
                    vm.image = e.target.result;
                };

                reader.readAsDataURL(file);
            },
            validate() {
                return this.$refs.form.validate().then(res => {
                    this.$emit("on-organizacion",
                        this.segmentomercado,
                        this.beneficiossemanales,
                        this.nombre,
                        this.logo,
                        this.rfc,
                        this.domicilio,
                        this.localidad,
                        this.municipio,
                        this.entidad,
                        this.pais,
                        this.codigo,
                        this.telefonooficina,
                        this.correooficina,
                        this.plananual,
                        this.actaconstitutiva,
                        this.constanciadonatoria,
                    );
                    return res;
                });
            },
            changeConstanciadonatoria(event) {
                this.constanciadonatoria = event.target.files[0];
            },
            changePlananual(event) {
                this.plananual = event.target.files[0];
            },
            changeActaconstitutiva(event) {
                this.actaconstitutiva = event.target.files[0];
            },
        }
    };
</script>
