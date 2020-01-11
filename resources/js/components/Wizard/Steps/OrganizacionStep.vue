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
                            <h6 class="description">{{ $t('firststep.logo') }}</h6>
                        </div>
                    </div>
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
                                <label>{{ $t('organizationstep.name') }}</label>
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
                                <label>{{ $t('organizationstep.direction') }}</label>
                                <md-input v-model="organizationdirection" type="text"></md-input>
                                <md-icon class="error" v-show="failed">close</md-icon>
                                <md-icon class="success" v-show="passed">done</md-icon>
                            </md-field>
                        </ValidationProvider>

                        <ValidationProvider
                            name="organizationtelphone"
                            rules="required|integer|min:9"
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
                                <label>{{ $t('organizationstep.phone') }}</label>
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
                                <label>{{ $t('organizationstep.cluni') }}</label>
                                <md-file @change="changeCLUNI" accept="application/pdf" type="file"/>
                            </md-field>
                        </ValidationProvider>

                        <ValidationProvider
                            name="constanciadonatoria"
                        >
                            <md-field
                                :class="[
                              { 'md-form-group': true }
                            ]"
                            >
                                <label>{{ $t('organizationstep.constancy') }}</label>
                                <md-file @change="changeDonatoria" accept="application/pdf" type="file"/>
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
                                <label>{{ $t('organizationstep.rfc') }}</label>
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
    import {required, min, max, integer} from "vee-validate/dist/rules";

    extend("required", required);
    extend("min", min);
    extend("max", max);
    extend("integer", integer);

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

                this.imageobject = files[0];

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
