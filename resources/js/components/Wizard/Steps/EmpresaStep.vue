<template>
    <ValidationObserver ref="form">
        <form @submit.prevent="validate">
            <div>
                <div class="md-layout">
                    <div class="md-layout-item md-size-50 md-small-size-100">
                        <ValidationProvider
                            name="bussinessname"
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
                                <md-icon>face</md-icon>
                                <label>Nombre de la empresa</label>
                                <md-input v-model="bussinessname" type="text"></md-input>
                                <md-icon class="error" v-show="failed">close</md-icon>
                                <md-icon class="success" v-show="passed">done</md-icon>
                            </md-field>
                        </ValidationProvider>

                        <ValidationProvider
                            name="bussinessdirection"
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
                                <md-icon>face</md-icon>
                                <label>Direccion fisica de la empresa</label>
                                <md-input v-model="bussinessdirection" type="text"></md-input>
                                <md-icon class="error" v-show="failed">close</md-icon>
                                <md-icon class="success" v-show="passed">done</md-icon>
                            </md-field>
                        </ValidationProvider>

                        <ValidationProvider
                            name="bussinesstelphone"
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
                                <md-icon>face</md-icon>
                                <label>Telefono de la empresa</label>
                                <md-input v-model="bussinesstelphone" type="text"></md-input>
                                <md-icon class="error" v-show="failed">close</md-icon>
                                <md-icon class="success" v-show="passed">done</md-icon>
                            </md-field>
                        </ValidationProvider>
                    </div>

                    <div class="md-layout-item md-size-50 md-small-size-100">
                        <ValidationProvider
                            name="cluni"
                            rules="required|mimes:application/pdf"
                            v-slot="{ passed, failed }"
                        >
                            <md-field
                                :class="[
                  { 'md-error': failed },
                  { 'md-valid': passed },
                  { 'md-form-group': true }
                ]"
                            >
                                <label>CLUNI [PDF]</label>
                                <md-file v-model="cluni" accept="application/pdf"/>
                                <md-icon class="error" v-show="failed">close</md-icon>
                                <md-icon class="success" v-show="passed">done</md-icon>
                            </md-field>
                        </ValidationProvider>

                        <ValidationProvider
                            name="constanciadonatoria"
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
                                <label>Contancia Donatoria [PDF] [Opcional]</label>
                                <md-file v-model="constanciadonatoria" accept="application/pdf"/>
                                <md-icon class="error" v-show="failed">close</md-icon>
                                <md-icon class="success" v-show="passed">done</md-icon>
                            </md-field>
                        </ValidationProvider>

                        <ValidationProvider
                            name="bussinessrfc"
                            rules="required|min:10"
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
                                <label>RFC de la empresa</label>
                                <md-input v-model="bussinessrfc" type="text"></md-input>
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
    import {required, email, min, max, integer} from "vee-validate/dist/rules";

    extend("required", required);
    extend("email", email);
    extend("min", min);
    extend("max", max);
    extend("integer", integer);
    extend("samepass", {
        params: ["pass"],
        validate: (value, pass) => {
            return value === pass.pass;
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
                bussinessname: "",
                bussinessdirection: "",
                bussinesstelphone: "",
                cluni: null,
                constanciadonatoria: null,
                bussinessrfc: "",
            };
        },
        methods: {
            handlePreview(file) {
                this.model.imageUrl = URL.createObjectURL(file.raw);
            },
            onFileChange(e) {
                var files = e.target.files || e.dataTransfer.files;
                if (!files.length) return;
                this.createImage(files[0]);
            },
            validate() {
                return this.$refs.form.validate().then(res => {
                    this.$emit("on-validated", res);
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
<style></style>
