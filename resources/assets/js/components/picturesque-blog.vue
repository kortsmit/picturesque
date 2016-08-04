<template>
    <div class="row">
        <div v-for="post in posts" track-by="id" class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ post.id }} - {{ post.title }}
                </div>
                <div class="panel-body">
                    {{ post.description }}
                </div>
                <div class="panel-footer">
                    <div class="btn-group btn-group-xs">
                        <a class="btn btn-default">Like</a>
                        <a v-link="{ name: 'post.show', params: { slug: post.slug }}"
                           class="btn btn-default">
                            View
                        </a>
                    </div>
                </div>
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
                        self.posts = JSON.parse(response.data)
                    })
            },

            likePost () {

            }
        }
    }
</script>
