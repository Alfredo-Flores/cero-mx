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
                                <md-icon>title</md-icon>
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
                                <md-icon>directions</md-icon>
                                <label>Direccion fisica de la empresa</label>
                                <md-input v-model="bussinessdirection" type="text"></md-input>
                                <md-icon class="error" v-show="failed">close</md-icon>
                                <md-icon class="success" v-show="passed">done</md-icon>
                            </md-field>
                        </ValidationProvider>
                    </div>

                    <div class="md-layout-item md-size-50 md-small-size-100">
                        <ValidationProvider
                            name="bussinesstelphone"
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
                                <label>Telefono de la empresa</label>
                                <md-input v-model="bussinesstelphone" type="text"></md-input>
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
                                <md-icon>title</md-icon>
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
    import {required, min, integer} from "vee-validate/dist/rules";

    extend("required", required);
    extend("min", min);
    extend("integer", integer);

    export default {
        data() {
            return {
                bussinessname: "",
                bussinessdirection: "",
                bussinesstelphone: "",
                bussinessrfc: "",
            };
        },
        methods: {
            validate() {
                return this.$refs.form.validate().then(res => {
                    this.$emit("on-empresa", this.bussinessname,
                        this.bussinessdirection,
                        this.bussinesstelphone,
                        this.bussinessrfc
                    );

                    return res;
                });
            }
        }
    };
</script>
<style></style>
