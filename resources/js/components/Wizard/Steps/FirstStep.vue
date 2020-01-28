<template>
    <ValidationObserver ref="form">
        <form @submit.prevent="validate">
            <div>
                <h6 class="info-text">
                    Por favor, llene los siguientes formularios, * significa que es obligatorio
                </h6>
                <div class="md-layout">
                    <div class="md-layout-item md-size-30 md-small-size-100">
                        <ValidationProvider
                            rules="required"
                            v-slot="{ validate }"
                        >
                            <div class="picture-container">
                                <div class="picture">
                                    <div v-if="!image">
                                        <img :src="avatar" class="picture-src" title=""/>
                                    </div>
                                        <div v-else>
                                        <img :src="image"/>
                                    </div>
                                    <input type="file" @change="onFileChange" v-on:change="validate"/>
                                </div>
                                <h6 class="description"> Foto de representante <p style="color: red">*</p></h6>
                            </div>
                        </ValidationProvider>
                    </div>
                    <div class="md-layout-item md-size-70 mt-4 md-small-size-100">

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
                                    <md-icon>info</md-icon>
                                    <label>Nombre</label>
                                    <p style="color: red">*</p>
                                    <md-input v-model="nombre" type="text"></md-input>
                                    <md-icon class="error" v-show="failed">close</md-icon>
                                    <md-icon class="success" v-show="passed">done</md-icon>
                                </md-field>
                            </ValidationProvider>

                        <div class="md-layout">
                            <div class="md-layout-item md-size-50 md-small-size-100">
                                <ValidationProvider
                                    name="primerapellido"
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
                                        <md-icon>info</md-icon>
                                        <label>Apellido paterno</label>
                                        <p style="color: red">*</p>
                                        <md-input v-model="primerapellido" type="text"></md-input>
                                        <md-icon class="error" v-show="failed">close</md-icon>
                                        <md-icon class="success" v-show="passed">done</md-icon>
                                    </md-field>
                                </ValidationProvider>
                            </div>

                            <div class="md-layout-item md-size-50 md-small-size-100">
                                <ValidationProvider
                                    name="segundoapellido"
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
                                        <md-icon>info</md-icon>
                                        <label>Apellido materno</label>
                                        <p style="color: red">*</p>
                                        <md-input v-model="segundoapellido" type="text"></md-input>
                                        <md-icon class="error" v-show="failed">close</md-icon>
                                        <md-icon class="success" v-show="passed">done</md-icon>
                                    </md-field>
                                </ValidationProvider>
                            </div>
                        </div>

                    </div>

                    <div class="md-layout-item md-size-50 ml-auto md-small-size-100">

                        <ValidationProvider
                            name="curp"
                            rules="required|curp"
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
                                <label>CURP</label>
                                <p style="color: red">*</p>
                                <md-input v-model="curp" type="text"></md-input>
                                <md-icon class="error" v-show="failed">close</md-icon>
                                <md-icon class="success" v-show="passed">done</md-icon>
                            </md-field>
                        </ValidationProvider>

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
                            name="nacionalidad"
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
                                <label>Nacionalidad</label>
                                <p style="color: red">*</p>
                                <md-select v-model="nacionalidad" class="ml-1">
                                    <md-option value="Mexicano">Mexicano</md-option>
                                </md-select>
                            </md-field>
                        </ValidationProvider>

                        <ValidationProvider
                            name="entidadfederativa"
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
                                <label>Entidad Federativa</label>
                                <p style="color: red">*</p>
                                <md-select v-model="entidadfederativa" class="ml-1">
                                    <md-option value="Durango">Durango</md-option>
                                </md-select>
                            </md-field>
                        </ValidationProvider>

                        <ValidationProvider
                            name="Municipio"
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
                        
                    </div>

                    <div class="md-layout-item md-size-50 ml-auto md-small-size-100">

                        <ValidationProvider
                            name="codigo"
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
                                <md-icon>info</md-icon>
                                <label>Codigo Postal</label>
                                <p style="color: red">*</p>
                                <md-input v-model="codigo" type="text"></md-input>
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
                            name="correolaboral"
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
                                <label>Correo Laboral</label>
                                <p style="color: red">*</p>
                                <md-input v-model="correolaboral" type="text"></md-input>
                                <md-icon class="error" v-show="failed">close</md-icon>
                                <md-icon class="success" v-show="passed">done</md-icon>
                            </md-field>
                        </ValidationProvider>

                        <ValidationProvider
                            name="correopersonal"
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
                                <label>Correo Personal</label>
                                <p style="color: red">*</p>
                                <md-input v-model="correopersonal" type="text"></md-input>
                                <md-icon class="error" v-show="failed">close</md-icon>
                                <md-icon class="success" v-show="passed">done</md-icon>
                            </md-field>
                        </ValidationProvider>

                        <ValidationProvider
                            name="telefonofijo"
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
                                <label>Telefono Fijo</label>
                                <p style="color: red">*</p>
                                <md-input v-model="telefonofijo" type="text"></md-input>
                                <md-icon class="error" v-show="failed">close</md-icon>
                                <md-icon class="success" v-show="passed">done</md-icon>
                            </md-field>
                        </ValidationProvider>

                        <ValidationProvider
                            name="telefonomovil"
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
                                <label>Telefono Movil</label>
                                <p style="color: red">*</p>
                                <md-input v-model="telefonomovil" type="text"></md-input>
                                <md-icon class="error" v-show="failed">close</md-icon>
                                <md-icon class="success" v-show="passed">done</md-icon>
                            </md-field>
                        </ValidationProvider>
                    </div>
                </div>
            </div>
        </form>
    </ValidationObserver>
</template>
<script>
    import {extend} from "vee-validate";
    import {email, integer, min, required} from "vee-validate/dist/rules";

    extend("required", required);
    extend("email", email);
    extend("min", min);
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
                nombre: "",
                primerapellido: "",
                segundoapellido: "",
                curp: "",
                rfc: "",
                correolaboral: "",
                correopersonal: "",
                nacionalidad: "",
                pais: "",
                lugarnacio: "",
                localidad: "",
                domicilio: "",
                municipio: "",
                entidadfederativa: "",
                codigo: "",
                telefonofijo: "",
                telefonomovil: "",
                foto: "",
                image: "",
                fotovalidation: "",
            };
        },
        methods: {
            handlePreview(file) {
                this.model.imageUrl = URL.createObjectURL(file.raw);
            },
            onFileChange(e) {
                var files = e.target.files || e.dataTransfer.files;
                if (!files.length) return;

                this.foto = files[0];
                this.fotovalidation = true;

                this.createImage(files[0]);
            },
            validate() {
                return this.$refs.form.validate().then(res => {
                    this.$emit("on-info",
                        this.nombre,
                        this.primerapellido,
                        this.segundoapellido,
                        this.curp,
                        this.rfc,
                        this.correolaboral,
                        this.correopersonal,
                        this.nacionalidad,
                        this.pais,
                        this.lugarnacio,
                        this.localidad,
                        this.domicilio,
                        this.municipio,
                        this.entidadfederativa,
                        this.codigo,
                        this.telefonofijo,
                        this.telefonomovil,
                        this.foto,
                        );
                    return res;
                });
            },
            createImage(file) {
                var reader = new FileReader();
                var vm = this;

                reader.onload = e => {
                    vm.image = e.target.result;
                };

                reader.readAsDataURL(file);
            }
        }
    };
</script>
