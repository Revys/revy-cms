<template>
    <div style="font-size: 16px">
        <il-image v-for="image in images" :key="image.id" :data="image"/>
    </div>
</template>

<script>
    import Image from './Image.vue';

    export default {
        components: {
            'il-image': Image
        },

        props: [
            'images'
        ],

        data() {
            return {}
        }
    }
</script>