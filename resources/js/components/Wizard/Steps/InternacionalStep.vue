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
    import {required, min, integer} from "vee-validate/dist/rules";

    extend("required", required);
    extend("min", min);
    extend("integer", integer);

    export default {
        data() {
            return {
                internationalname: "",
                internationaldirection: "",
                internationaltelphone: ""
            };
        },
        methods: {
            validate() {
                return this.$refs.form.validate().then(res => {
                    this.$emit("on-internacional", this.internationalname,
                        this.internationaldirection,
                        this.internationaltelphone
                    );

                    return res;
                });
            }
        }
    };
</script>
<style></style>
