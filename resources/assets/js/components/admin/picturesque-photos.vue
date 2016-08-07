<template>
    <section class="content">
        <h1>Photos</h1>

        <div class="row">
            <picturesque-menu :current="photos"></picturesque-menu>

        </div>
    </section>
</template>

<script>
    import PicturesqueMenu from './../template/picturesque-admin-menu.vue'

    export default {
        name: 'picturesque-photos',

        components: {
            PicturesqueMenu
        },
        replace: false
    }
</script>
