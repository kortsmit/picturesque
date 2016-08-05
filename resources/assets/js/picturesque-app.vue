<template>
    <picturesque-navigation></picturesque-navigation>
    <div class="container">
        <div id="app">
            <section class="content">
                <router-view></router-view>
            </section>
        </div>
    </div>
</template>

<style>

</style>

<script>
    import PicturesqueNavigation from './components/template/picturesque-navigation.vue'

    export default {
        name: 'app',

        components: {
            PicturesqueNavigation
        },
        replace: false
    }
</script>
