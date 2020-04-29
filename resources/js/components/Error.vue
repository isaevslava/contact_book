<template>
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">{{ error.title }}</h4>
        <template v-if="error.errors">
            <hr>
            <ul>
                <li v-for="e in error.errors">{{ e }}</li>
            </ul>
        </template>
    </div>
</template>

<script>
    export default {
        name: 'Error',

        props: ['error'],
    }
</script>
