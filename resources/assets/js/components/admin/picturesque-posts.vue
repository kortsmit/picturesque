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
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="post in posts" :class="{ 'removed' : post.removed }">
                            <td>{{ post.id }}</td>
                            <td>{{ post.title }}</td>
                            <td>
                                <a class="btn btn-success" role="button">Publish</a>
                            </td>
                            <td>
                                <a v-link="{ name: 'admin.post.edit', params: { id: post.id }}"
                                   class="btn btn-secondary">Edit</a>
                            </td>
                            <td>
                                <a class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>

        </div>
    </section>
</template>

<script>
    import PicturesqueMenu from './picturesque-menu.vue'

    export default {
        name: 'picturesque-posts',

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
