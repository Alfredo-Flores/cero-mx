<template>
    <ValidationObserver ref="form">
        <form @submit.prevent="validate">
            <div>
                <div class="md-layout">
                    <div class="md-layout-item md-size-50 md-small-size-100">
                        <ValidationProvider
                            name="organizationname"
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
                                <label>Nombre de la organización</label>
                                <md-input v-model="organizationname" type="text"></md-input>
                                <md-icon class="error" v-show="failed">close</md-icon>
                                <md-icon class="success" v-show="passed">done</md-icon>
                            </md-field>
                        </ValidationProvider>

                        <ValidationProvider
                            name="organizationdirection"
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
                                <md-icon>directions</md-icon>
                                <label>Direccion fisica de la organización</label>
                                <md-input v-model="organizationdirection" type="text"></md-input>
                                <md-icon class="error" v-show="failed">close</md-icon>
                                <md-icon class="success" v-show="passed">done</md-icon>
                            </md-field>
                        </ValidationProvider>

                        <ValidationProvider
                            name="organizationtelphone"
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
                                <md-icon>call</md-icon>
                                <label>Telefono de la organización</label>
                                <md-input v-model="organizationtelphone" type="text"></md-input>
                                <md-icon class="error" v-show="failed">close</md-icon>
                                <md-icon class="success" v-show="passed">done</md-icon>
                            </md-field>
                        </ValidationProvider>
                    </div>

                    <div class="md-layout-item md-size-50 md-small-size-100">
                        <ValidationProvider
                            name="cluni"
                        >
                            <md-field
                                class="md-form-group"
                            >
                                <label>CLUNI [PDF]</label>
                                <md-file @change="changeCLUNI" accept="application/pdf" type="file"/>
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
                                type="file"
                            >
                                <label>Const. Donatoria [PDF] [Opcional]</label>
                                <md-file @change="changeDonatoria" accept="application/pdf" type="file"/>
                                <md-icon class="error" v-show="failed">close</md-icon>
                                <md-icon class="success" v-show="passed">done</md-icon>
                            </md-field>
                        </ValidationProvider>

                        <ValidationProvider
                            name="organizationrfc"
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
                                <md-icon>title</md-icon>
                                <label>RFC de la organización</label>
                                <md-input v-model="organizationrfc" type="text"></md-input>
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
                organizationname: "",
                organizationdirection: "",
                organizationtelphone: "",
                cluni: null,
                constanciadonatoria: null,
                organizationrfc: "",
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
                    this.$emit("on-organizacion", this.organizationname,
                        this.organizationdirection,
                        this.organizationtelphone,
                        this.cluni,
                        this.constanciadonatoria,
                        this.organizationrfc);
                    return res;
                });
            },
            changeCLUNI(event) {
                this.cluni = event.target.files[0];
            },
            changeDonatoria(event) {
                this.constanciadonatoria = event.target.files[0];
            },
        }
    };
</script>
<style></style>
