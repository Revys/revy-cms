<template>
    <div class="form__images__image">
        <img src="" :src="path" />
        <input type="text" disabled="true" style="font-size: 14px" name="_positions[]" :value="data.filename"/>
        <div class="form__images__image__delete"></div>
    </div>
</template>

<script>
    export default {
        props: [
            'data'
        ],
        computed: {
            path: function () {
                return '/storage/' + this.data.path;
            }
        }
    }
</script>