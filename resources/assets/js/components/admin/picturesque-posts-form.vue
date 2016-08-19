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

                    <div class="form-group" :class="{ 'has-danger' : formErrors['title'] }">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Title"
                               :class="{ 'form-control-danger' : formErrors['title'] }"
                               v-model="post.title">
                        <small v-if="formErrors['title']" class="form-text text-danger">
                            {{ formErrors['title'] }}
                        </small>
                        <small v-else class="form-text text-muted">
                            The title of the post.
                        </small>
                    </div>

                    <div class="form-group" :class="{ 'has-danger' : formErrors['slug'] }">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" id="slug" placeholder="Slug"
                               :class="{ 'form-control-danger' : formErrors['slug'] }"
                               v-model="post.slug">
                        <small v-if="formErrors['slug']" class="form-text text-danger">
                            {{ formErrors['slug'] }}
                        </small>
                        <small v-else class="form-text text-muted">
                            The slug is used for the URL address linking to the post.
                        </small>
                    </div>

                    <div class="form-group" :class="{ 'has-danger' : formErrors['description'] }">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" placeholder="description"
                                  :class="{ 'form-control-danger' : formErrors['description'] }"
                                  v-model="post.description"></textarea>
                        <small v-if="formErrors['description']" class="form-text text-danger">
                            {{ formErrors['description'] }}
                        </small>
                        <small v-else class="form-text text-muted">
                            A short description that shows up on the blog listing.
                        </small>
                    </div>

                    <div class="form-group" :class="{ 'has-danger' : formErrors['text'] }">
                        <label for="text">Post</label>
                        <textarea class="form-control" id="text" placeholder="Post" rows="10"
                                  :class="{ 'form-control-danger' : formErrors['text'] }"
                                  v-model="post.text"></textarea>
                        <small v-if="formErrors['text']" class="form-text text-danger">
                            {{ formErrors['text'] }}
                        </small>
                        <small v-else class="form-text text-muted">
                            The actual blog post. It'll support markdown soon enough! But... not yet.
                        </small>
                    </div>

                    <div class="form-group pull-xs-left">
                        <button type="button"
                                v-link="{ path: '/admin/posts' }"
                                class="btn btn-secondary">Back</button>
                    </div>
                    <div class="form-group pull-xs-right">
                        <button type="button"
                                @click="savePost"
                                :disabled="formSaving"
                                class="btn btn-primary">Save</button>
                        <div class="btn-group" role="group">
                            <button type="button"
                                    @click="togglePublished(0)"
                                    :disabled="post.published == 0"
                                    :disabled="formSaving"
                                    :class="{ 'btn-success' : post.published == 0 }"
                                    class="btn btn-secondary">Draft</button>
                            <button type="button"
                                    @click="togglePublished(1)"
                                    :disabled="post.published == 1"
                                    :disabled="formSaving"
                                    :class="{ 'btn-success' : post.published == 1 }"
                                    class="btn btn-secondary">Publish</button>
                        </div>
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
                post: {
                    id: 0,
                    published: 0,
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
                formErrors: {},
                formSaving: false
            }
        },

        ready () {
            //this.fetchCategories()
            if ( this.$route.name !== 'admin.posts.create' ) {
                this.post.id = this.$route.params.id
                this.fetchPost()
            }
        },

        methods: {

            fetchPost () {
                let self = this
                self.$http.get('api/posts/' + this.post.id)
                    .then(function (response) {
                        self.post = JSON.parse(response.data)
                    })
            },

            savePost () {
                let self = this
                self.formSaving = true

                if ( self.post.id == 0 ) {
                    self.createNewPost()
                } else {
                    self.editPost()
                }

            },

            createNewPost () {
                let self = this
                self.$http.post('api/posts', self.post)
                    .then(function (response) {
                        console.log('success', response)
                        self.post.id = JSON.parse(response.data).id
                        self.formSaving = false
                    })
                    .catch(function (response, status, request) {
                        var errors = JSON.parse(response.data)
                        self.formErrors = errors
                        self.formSaving = false
                    })
            },

            editPost () {
                let self = this
                self.$http.patch('api/posts/' + self.post.id, self.post)
                    .then(function (response) {
                        console.log('success', response)
                        self.formSaving = false
                    })
                    .catch(function (response, status, request) {
                        var errors = JSON.parse(response.data)
                        self.formErrors = errors
                        self.formSaving = false
                    })
            },

            togglePublished (published) {
                let self = this
                self.formSaving = true
                self.post.published = published
                self.savePost()
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
