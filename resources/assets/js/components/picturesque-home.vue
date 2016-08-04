<template>
    <section class="content">
        <h1>Home</h1>
        <picturesque-blog></picturesque-blog>
    </section>
</template>

<script>
    import PicturesqueBlog from './../components/picturesque-blog.vue'

    export default {
        name: 'home',

        components: {
            PicturesqueBlog,
        },

    }
</script>
