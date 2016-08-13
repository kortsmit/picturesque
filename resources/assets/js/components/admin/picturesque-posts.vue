<template>
    <section class="content">
        <h1>Posts</h1>

        <div class="row">
            <picturesque-menu :current="posts"></picturesque-menu>

            <div class="col-md-10">
                <table class="table table-hover">

                    <thead>
                        <tr>
                            <th width="1%">#</th>
                            <th>Title</th>
                            <th></th>
                            <th width="1%">
                                <a href="#"
                                   v-link="{ name: 'admin.posts.create' }"
                                   class="btn btn-success">Create</a>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="post in posts" :class="{ 'removed' : post.removed }">
                            <td>{{ post.id }}</td>
                            <td>{{ post.title }}</td>
                            <td>
                                <a href="#"
                                   v-link="{ name: 'admin.post.edit', params: { id: post.id }}"
                                   class="btn btn-secondary">Edit</a>
                            </td>
                            <td>
                                <a href="#"
                                   class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    </tbody>

                </table>

                <picturesque-pagination :pagination="pagination" :callback="fetchPosts"></picturesque-pagination>

            </div>

        </div>
    </section>
</template>

<script>
    import PicturesqueMenu from './../template/picturesque-admin-menu.vue'
    import PicturesquePagination from './../helpers/picturesque-pagination.vue'

    export default {
        name: 'picturesque-posts',

        components: {
            PicturesqueMenu,
            PicturesquePagination
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
                self.loading = true
                self.$http.get('api/posts?page='+ self.pagination.current_page)
                    .then(function (response) {
                        self.posts = JSON.parse(response.data).data
                        self.makePagination(JSON.parse(response.data))
                    })
            },

            makePagination (data) {
                let pagination = {
                    total: data.total,
                    per_page: data.per_page,
                    from: data.from,
                    to: data.to,
                    current_page: data.current_page,
                    last_page: data.last_page
                }
                this.$set('pagination', pagination)
            },

        }

    }
</script>
