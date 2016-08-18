<template>
    <div class="card-columns">
        <div class="card" v-for="post in posts">
            <!--<img class="card-img-top" src="...">-->
            <div class="card-block">
                <h4 class="card-title">{{ post.id }} - {{ post.title }}</h4>
                <p class="card-text">{{ post.description }}</p>
                <a href="#"
                   class="btn btn-sm btn-secondary">Like</a>
                <a v-link="{ name: 'post', params: { slug: post.slug }}"
                   class="btn btn-sm btn-secondary">
                    View
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'blog',

        components: {

        },

        //replace: false,

        data() {
            return {
                posts: []
            }
        },

        created() {
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

            likePost () {

            }
        }
    }
</script>
