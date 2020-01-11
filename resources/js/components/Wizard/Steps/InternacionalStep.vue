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
                                <label>{{ $t('internationalstep.name') }}</label>
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
                                <label>{{ $t('internationalstep.direction') }}</label>
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
                                <label>{{ $t('internationalstep.phone') }}</label>
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
        props: {
            avatar: {
                type: String,
                default: "./img/default-avatar.png"
            }
        },
        data() {
            return {
                image: "",
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
