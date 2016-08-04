<template>
    <section class="content">
        <h1>Photos</h1>

        <div class="row">
            <picturesque-menu :current="photos"></picturesque-menu>

        </div>
    </section>
</template>

<script>
    import PicturesqueMenu from './picturesque-menu.vue'

    export default {
        name: 'photos',

        components: {
            PicturesqueMenu
        },
        replace: false
    }
</script>
