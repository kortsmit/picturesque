<template>
    <section class="content">
        <h1>Admin</h1>

        <div class="row">
            <picturesque-menu></picturesque-menu>

        </div>
    </section>
</template>

<script>
    import PicturesqueMenu from './template/picturesque-admin-menu.vue'

    export default {
        name: 'admin',

        components: {
            PicturesqueMenu
        }
    }
</script>
