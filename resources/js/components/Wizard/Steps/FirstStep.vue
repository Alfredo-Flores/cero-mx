<template>
    <ValidationObserver ref="form">
        <form @submit.prevent="validate">
            <div>
                <div class="md-layout">
                    <div class="md-layout-item md-size-40 md-small-size-100">
                        <div class="picture-container">
                            <div class="picture">
                                <div v-if="!image">
                                    <img class="picture-src" title=""/>
                                </div>
                                <div v-else>
                                    <img :src="image"/>
                                </div>
                                <input type="file" @change="onFileChange"/>
                            </div>
                            <h6 class="description">Subir Logo</h6>
                        </div>
                    </div>
                    <div class="md-layout-item md-size-60 mt-4 md-small-size-100">
                        <ValidationProvider
                            name="firstName"
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
                                <label>Nombre completo del representante</label>
                                <md-input v-model="firstName" type="text"></md-input>
                                <md-icon class="error" v-show="failed">close</md-icon>
                                <md-icon class="success" v-show="passed">done</md-icon>
                            </md-field>
                        </ValidationProvider>

                        <ValidationProvider
                            name="tel"
                            rules="required|integer|max:10"
                            v-slot="{ passed, failed }"
                        >
                            <md-field
                                :class="[
                  { 'md-error': failed },
                  { 'md-valid': passed },
                  { 'md-form-group': true }
                ]"
                            >
                                <md-icon>record_voice_over</md-icon>
                                <label>Telefono de contacto</label>
                                <md-input v-model="tel" type="text"></md-input>
                                <md-icon class="error" v-show="failed">close</md-icon>
                                <md-icon class="success" v-show="passed">done</md-icon>
                            </md-field>
                        </ValidationProvider>
                    </div>
                    <div class="md-layout-item md-size-95 ml-auto mt-4 md-small-size-100">
                        <ValidationProvider
                            name="email"
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
                                <label>Email</label>
                                <md-input v-model="email" type="text"></md-input>
                                <md-icon class="error" v-show="failed">close</md-icon>
                                <md-icon class="success" v-show="passed">done</md-icon>
                            </md-field>
                        </ValidationProvider>

                        <ValidationProvider
                            name="pass"
                            rules="required|min:4"
                            v-slot="{ passed, failed }"
                        >
                            <md-field
                                :class="[
                  { 'md-error': failed },
                  { 'md-valid': passed },
                  { 'md-form-group': true }
                ]"
                            >
                                <md-icon>more_horiz</md-icon>
                                <label>Contraseña</label>
                                <md-input v-model="pass" type="password"></md-input>
                                <md-icon class="error" v-show="failed">close</md-icon>
                                <md-icon class="success" v-show="passed">done</md-icon>
                            </md-field>
                        </ValidationProvider>

                        <ValidationProvider
                            name="passconf"
                            rules="required|min:4|samepass:@pass"
                            v-slot="{ passed, failed }"
                        >
                            <md-field
                                :class="[
                  { 'md-error': failed },
                  { 'md-valid': passed },
                  { 'md-form-group': true }
                ]"
                            >
                                <md-icon>more_horiz</md-icon>
                                <label>Repetir Contraseña</label>
                                <md-input v-model="passconf" type="password"></md-input>
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
    import {required, email, min, max, integer, mimes} from "vee-validate/dist/rules";

    extend("required", required);
    extend("email", email);
    extend("min", min);
    extend("max", max);
    extend("integer", integer);
    extend("mimes", mimes);
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
                image: "",
                archivo: "",
                firstName: "",
                tel: "",
                email: "",
                pass: "",
                passconf: "",
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
                    this.$emit("on-info", this.image,
                        this.firstName,
                        this.tel,
                        this.email,
                        this.pass);
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
