<template>
    <section class="content">
        <h1>Admin</h1>

        <div class="row">
            <picturesque-menu></picturesque-menu>

        </div>
    </section>
</template>

<script>
    import PicturesqueMenu from './../components/admin/picturesque-menu.vue'

    export default {
        name: 'admin',

        components: {
            PicturesqueMenu
        },
        replace: false
    }
</script>
