<template>
    <section class="content">
        <h1>Categories</h1>

        <div class="row">
            <picturesque-menu :current="categories"></picturesque-menu>

            <div class="col-md-10">

                Category ID is {{ $route.params.id }}

            </div>

        </div>
    </section>
</template>

<script>
    import PicturesqueMenu from './../template/picturesque-admin-menu.vue'

    export default {
        name: 'picturesque-categories-form',

        components: {
            PicturesqueMenu
        },

        props: {
            loading: true,
        },

        data() {
            return {
                categories: [],
                pagination: {
                    total: 0,
                    per_page: 10,
                    from: 1,
                    to: 0,
                    current_page: 1
                },
            }
        },

        mounted () {
            this.fetchCategory()
        },

        methods: {

            fetchCategory () {
                let self = this
                self.$http.get('api/categories')
                    .then(function (response) {
                        self.categories = response.data.data
                    })
            },

        }

    }
</script>
