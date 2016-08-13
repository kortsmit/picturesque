<template>
    <section class="content">
        <h1>Create New Post - {{ $route.params.id }}</h1>

        <div class="row">
            <picturesque-menu :current="posts"></picturesque-menu>

            <div class="col-md-10">

                <!-- other items:
                    category
                    user
                -->

                <form @submit.prevent="savePost">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Title" v-model="post.title">
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" id="slug" placeholder="Slug" v-model="post.slug">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" placeholder="description" v-model="post.description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="text">Post</label>
                        <textarea class="form-control" id="text" placeholder="Post" rows="10" v-model="post.text"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-secondary">Back</button>
                        <button type="button" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-success">Publish</button>
                    </div>
                </form>

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
                postId: 0,
                post: {
                    categories: [],
                    title: '',
                    slug: '',
                    description: '',
                    text: ''
                },
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
            //this.fetchCategories()
            this.postId = this.$route.params.id
            this.fetchPost()
        },

        methods: {

            fetchPost () {
                let self = this
                self.$http.get('api/posts/' + this.postId)
                    .then(function (response) {
                        self.post = JSON.parse(response.data)
                    })
            },

            savePost () {

            }

//            fetchCategories () {
//                let self = this
//                self.$http.get('api/categories')
//                    .then(function (response) {
//                        self.categories = JSON.parse(response.data).data
//                    })
//            },

        }

    }
</script>
