<template>
    <div>
        <error-component v-if="error" :error="error"/>
        <input-file-component v-if="!isFileUploaded" @onChange="uploadFile"/>
        <mapping-component v-else :fromFields="fieldsFromFile" :toFields="fieldsToChoose" @onSubmit="saveMapping"/>
    </div>
</template>

<script>
    const redirectTo = (href = '/') => window.location.href = href;
    const scrollToTop = () => window.scrollTo(0,0);
    const responseErrorTransform = (e) => {
        const { data = {} } = e.response;

        const title = data.message || e.message;
        const errors = data.errors
            ? Object.values(data.errors).reduce((res, fieldErrors) => [
                ...res,
                ...Object.values(fieldErrors)
            ], [])
            : null;

        return { title, errors };
    };

    export default {
        name: 'Import',

        data() {
            return {
                isFileUploaded: false,
                fieldsFromFile: [],
                fieldsToChoose: [],
                error: null,
            };
        },

        methods: {
            async uploadFile(file) {
                this.error = null;

                const config = { headers: { 'content-type': 'multipart/form-data' } };
                const formData = new FormData();

                formData.append('import', file, file.name);

                try {
                    const {
                        data: { fieldsFromFile = [], fieldsToChoose = [] }
                    } = await axios.post('/api/upload-file', formData, config);
                    this.fieldsFromFile = fieldsFromFile;
                    this.fieldsToChoose = fieldsToChoose;
                    this.isFileUploaded = true;
                }
                catch (e) {
                    this.error = responseErrorTransform(e);
                }
            },

            async saveMapping(mapping) {
                this.error = null;

                try {
                    await axios.post('/api/save-mapping', { mapping });
                    redirectTo('/contacts');
                }
                catch (e) {
                    this.error = responseErrorTransform(e);
                    scrollToTop();
                }
            }
        }
    }
</script>
