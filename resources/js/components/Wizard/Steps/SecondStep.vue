<template>
    <div>
        <h5 class="info-text"> ¿Qué tipo de institución es? </h5>
        <div class="md-layout">
            <div class="md-layout-item">
                <div class="md-layout">
                    <div class="md-layout-item md-size-50 md-small-size-100">
                        <icon-checkbox
                            v-model="checkone"
                            icon="fas fa-building"
                            title="Empresa"
                            @click.native="changeCheck(1)"
                        >
                        </icon-checkbox>
                    </div>
                    <div class="md-layout-item md-size-50 md-small-size-100">
                        <icon-checkbox
                            v-model="checktwo"
                            icon="fas fa-home"
                            title="Organización"
                            @click.native="changeCheck(2)"
                        >
                        </icon-checkbox>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import IconCheckbox from "../../Inputs/IconCheckbox.vue";

    export default {
        components: {
            IconCheckbox
        },
        data() {
            return {
                checkone: true,
                checktwo: false,
                checkthree: false,
            };
        },
        methods: {
            changeCheck(check) {
                if (check === 1) {
                    this.checkone = true;
                    this.checktwo = false;
                    this.checkthree = false;
                } if (check === 2) {
                    this.checkone = false;
                    this.checktwo = true;
                    this.checkthree = false;
                }
            },
            validate() {
                var type = 0;
                if (this.checkone) type = 1;
                if (this.checktwo) type = 2;
                if (this.checkthree) type = 3;
                this.$emit("on-type", type);
                return Promise.resolve(true);
            }
        }
    };
</script>
