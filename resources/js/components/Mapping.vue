<template>
    <dl class="row">
        <template v-for="fromField in fromFields">
            <dt class="col-sm-5">{{ fromField }}</dt>
            <dd class="col-sm-7">
                <select class="custom-select" @change="onChange($event, fromField)">
                    <option selected>Choose...</option>
                    <option v-for="toField in toFields" :value="toField">{{ toField }}</option>
                </select>
            </dd>
        </template>
        <dd class="col-sm-7">
            <button class="btn btn-primary" @click="submit">Submit</button>
        </dd>
    </dl>
</template>

<script>
    export default {
        name: 'Mapping',

        props: ['fromFields', 'toFields'],

        data() {
            return {
                mapping: {},
            };
        },

        methods: {
            onChange(event, fromField) {
                if (event.target.value) {
                    this.mapping[fromField] = event.target.value
                }
                else if(this.mapping[fromField]) {
                    delete this.mapping[fromField];
                }
            },

            submit() {
                this.$emit('onSubmit', this.mapping);
            },
        }
    }
</script>
