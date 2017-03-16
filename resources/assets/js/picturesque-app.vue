<template>
    <div>
        <picturesque-navigation></picturesque-navigation>
        <div class="container">
            <div id="app">
                <section class="content">
                    <router-view></router-view>
                </section>
            </div>
        </div>
    </div>
</template>

<script>
    import PicturesqueNavigation from './components/template/picturesque-navigation.vue'

    export default {
        name: 'app',

        components: {
            PicturesqueNavigation
        }
    }
</script>
