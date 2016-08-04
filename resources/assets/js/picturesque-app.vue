<template>
    <div>
        <picturesque-navigation></picturesque-navigation>
    </div>
    <div id="app">
        <section class="content">
            <router-view></router-view>
        </section>
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
