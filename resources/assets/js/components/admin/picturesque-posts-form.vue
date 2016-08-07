<template>
    <section class="content">
        <h1>Posts</h1>

        <div class="row">
            <picturesque-menu :current="posts"></picturesque-menu>

            <div class="col-md-10">

                Post ID is {{ $route.params.id }}

            </div>

        </div>
    </section>
</template>

<script>
    import PicturesqueMenu from './../template/picturesque-admin-menu.vue'

    export default {
        name: 'picturesque-posts-form',

        components: {
            PicturesqueMenu
        },

        props: {
            loading: true,
        },

        data() {
            return {
                posts: [],
                pagination: {
                    total: 0,
                    per_page: 10,
                    from: 1,
                    to: 0,
                    current_page: 1
                },
            }
        },

        ready () {
            this.fetchPosts()
        },

        methods: {

            fetchPosts () {
                let self = this
                self.$http.get('api/posts')
                    .then(function (response) {
                        self.posts = JSON.parse(response.data).data
                    })
            },

        }

    }
</script>
