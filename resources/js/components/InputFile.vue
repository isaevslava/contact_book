<template>
    <div class="form-group">
        <label for="inputFile" class="d-flex align-items-center justify-content-center p-3 py-5 mb-2">
            <svg class="bi bi-file-earmark-spreadsheet" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M13 9H3V8h10v1zm0 3H3v-1h10v1z" clip-rule="evenodd"/>
                <path fill-rule="evenodd" d="M5 14V9h1v5H5zm4 0V9h1v5H9z" clip-rule="evenodd"/>
                <path d="M4 1h5v1H4a1 1 0 00-1 1v10a1 1 0 001 1h8a1 1 0 001-1V6h1v7a2 2 0 01-2 2H4a2 2 0 01-2-2V3a2 2 0 012-2z"/>
                <path d="M9 4.5V1l5 5h-3.5A1.5 1.5 0 019 4.5z"/>
            </svg>
        </label>
        <input type="file" class="form-control-file" id="inputFile" v-on:change="onInputChange">
    </div>
</template>

<script>
    export default {
        name: 'InputFile',

        methods: {
            onInputChange(event) {
                const { files } = event.target;
                if (files.length > 0) {
                    this.$emit('onChange', files[0]);
                }
            },
        }
    }
</script>

<style scoped>
    label {
        font-size: 10em;
    }
</style>
