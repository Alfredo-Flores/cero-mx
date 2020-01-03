<template>
    <ValidationObserver ref="form">
        <form @submit.prevent="validate">
            <div>
                <div class="md-layout">
                    <div class="md-layout-item md-size-100">
                        <ValidationProvider
                            name="internationalname"
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
                                <label>Nombre de la internacional</label>
                                <md-input v-model="internationalname" type="text"></md-input>
                                <md-icon class="error" v-show="failed">close</md-icon>
                                <md-icon class="success" v-show="passed">done</md-icon>
                            </md-field>
                        </ValidationProvider>

                        <ValidationProvider
                            name="internationaldirection"
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
                                <md-icon>public</md-icon>
                                <label>Direccion fisica de la internacional</label>
                                <md-input v-model="internationaldirection" type="text"></md-input>
                                <md-icon class="error" v-show="failed">close</md-icon>
                                <md-icon class="success" v-show="passed">done</md-icon>
                            </md-field>
                        </ValidationProvider>

                        <ValidationProvider
                            name="internationaltelphone"
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
                                <label>Telefono de la internacional</label>
                                <md-input v-model="internationaltelphone" type="text"></md-input>
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
                internationalname: "",
                internationaldirection: "",
                internationaltelphone: ""
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
                    this.$emit("on-internacional", this.internationalname,
                        this.internationaldirection,
                        this.internationaltelphone
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
<style></style>
