<template>
    <section class="content">
        <h1>{{ post.title }}</h1>

        <p class="lead">
            {{ post.description }}
        </p>

        <p>
            {{ post.text }}
        </p>

    </section>
</template>

<style>

</style>

<script>
    export default {
        name: 'post',

        props: {
            loading: true,
        },

        data() {
            return {
                postSlug: 0,
                post: {
                    categories: [],
                    title: '',
                    slug: '',
                    description: '',
                    text: ''
                }
            }
        },

        mounted () {
            this.postSlug = this.$route.params.slug

            this.fetchPost()
        },

        methods: {

            fetchPost () {
                let self = this
                self.$http.get('api/posts/slug/' + this.postSlug)
                    .then(function (response) {
                        self.post = JSON.parse(response.data)
                    })
            },

        }
    }
</script>

