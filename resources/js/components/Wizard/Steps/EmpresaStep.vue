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
                            <h6 class="description">Logo de la empresa</h6>
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
                                <md-select v-model="municipio" class="ml-1">
                                    <md-option value="Durango">Durango</md-option>
                                </md-select>                                <md-icon class="error" v-show="failed">close</md-icon>
                                <md-icon class="success" v-show="passed">done</md-icon>
                            </md-field>

                        </ValidationProvider>

                        <ValidationProvider
                            name="direccion"
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
                                <md-input v-model="direccion" type="text"></md-input>
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
                            name="codigopostal"
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
                                <md-input v-model="codigopostal" type="text"></md-input>
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
                            name="giro"
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
                                <label>Giro de la empresa</label>
                                <p style="color: red">*</p>
                                <md-input v-model="giro" type="text"></md-input>
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
                            name="descripcionalimentos"
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
                                <label>Descripción breve de alimentos a donar</label>
                                <p style="color: red">*</p>
                                <md-input v-model="descripcionalimentos" type="text"></md-input>
                                <md-icon class="error" v-show="failed">close</md-icon>
                                <md-icon class="success" v-show="passed">done</md-icon>
                            </md-field>
                        </ValidationProvider>

                        <ValidationProvider
                            name="cantidaddonacion"
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
                                <label>Cantidad a donar aproximadamente</label>
                                <p style="color: red">*</p>
                                <md-input v-model="cantidaddonacion" type="number"></md-input>
                                <md-icon class="error" v-show="failed">close</md-icon>
                                <md-icon class="success" v-show="passed">done</md-icon>
                            </md-field>
                        </ValidationProvider>

                        <ValidationProvider
                            name="tiempoconsumo"
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
                                <md-icon>face</md-icon>
                                <label>Tiempo de restante para consumo humano</label>
                                <md-select v-model="tiempoconsumo" class="ml-1">
                                    <md-option value=""></md-option>
                                    <md-option value="1">1 día</md-option>
                                    <md-option value="2">2 días</md-option>
                                    <md-option value="3">3 días</md-option>
                                    <md-option value="4">4 días</md-option>
                                    <md-option value="5">5 días</md-option>
                                    <md-option value="6">6 días</md-option>
                                    <md-option value="7">1 semana</md-option>
                                    <md-option value="8">Más de 1 semana</md-option>
                                </md-select>
                            </md-field>
                        </ValidationProvider>

                        <ValidationProvider
                            name="horarioentrega"
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
                                <md-icon>face</md-icon>
                                <label>Horario de entrega de alimentos</label>
                                <md-select v-model="horarioentrega" class="ml-1">
                                    <md-option value=""></md-option>
                                    <md-option value="0:00">0:00 AM</md-option>
                                    <md-option value="1:00">1:00 AM</md-option>
                                    <md-option value="2:00">2:00 AM</md-option>
                                    <md-option value="3:00">3:00 AM</md-option>
                                    <md-option value="4:00">4:00 AM</md-option>
                                    <md-option value="5:00">5:00 AM</md-option>
                                    <md-option value="6:00">6:00 AM</md-option>
                                    <md-option value="7:00">7:00 AM</md-option>
                                    <md-option value="8:00">8:00 AM</md-option>
                                    <md-option value="9:00">9:00 AM</md-option>
                                    <md-option value="10:00">10:00 AM</md-option>
                                    <md-option value="11:00">11:00 AM</md-option>
                                    <md-option value="12:00">12:00 AM</md-option>
                                    <md-option value="13:00">1:00 PM</md-option>
                                    <md-option value="14:00">2:00 PM</md-option>
                                    <md-option value="15:00">3:00 PM</md-option>
                                    <md-option value="16:00">4:00 PM</md-option>
                                    <md-option value="17:00">5:00 PM</md-option>
                                    <md-option value="18:00">6:00 PM</md-option>
                                    <md-option value="19:00">7:00 PM</md-option>
                                    <md-option value="20:00">8:00 PM</md-option>
                                    <md-option value="21:00">9:00 PM</md-option>
                                    <md-option value="22:00">10:00 PM</md-option>
                                    <md-option value="23:00">11:00 PM</md-option>
                                </md-select>
                            </md-field>
                        </ValidationProvider>
                    </div>

                    <div class="md-layout-item md-size-100 md-small-size-100">
                        <ValidationProvider
                            name="detallesentrega"
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
                                <label>Descripción para la entrega (Dirigase con quien, donde, condiciones de entrega...)</label>
                                <p style="color: red">*</p>
                                <md-textarea v-model="detallesentrega" type="text" md-autogrow></md-textarea>
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
    import {required, min, integer} from "vee-validate/dist/rules";

    extend("required", required);
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
                image: "",
                logo: "",

                nombre: "",
                direccion: "",
                localidad: "",
                municipio: "",
                entidad: "",
                pais: "",
                codigopostal: "",
                rfc: "",
                giro: "",
                telefonooficina: "",
                correooficina: "",
                descripcionalimentos: "",
                cantidaddonacion: "",
                tiempoconsumo: "",
                horarioentrega: "",
                detallesentrega: "",
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
                    this.$emit("on-empresa",
                        this.nombre,
                        this.direccion,
                        this.localidad,
                        this.municipio,
                        this.entidad,
                        this.pais,
                        this.codigopostal,
                        this.rfc,
                        this.giro,
                        this.telefonooficina,
                        this.correooficina,
                        this.descripcionalimentos,
                        this.cantidaddonacion,
                        this.tiempoconsumo,
                        this.horarioentrega,
                        this.detallesentrega,
                    );

                    return res;
                });
            }
        }
    };
</script>
<style></style>
