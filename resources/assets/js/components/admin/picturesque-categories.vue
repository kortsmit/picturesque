<template>
    <section class="content">
        <h1>Categories</h1>

        <div class="row">
            <picturesque-menu :current="categories"></picturesque-menu>

            <div class="col-md-10">
                <table class="table table-hover">

                    <thead>
                        <tr>
                            <th width="1%">#</th>
                            <th>Title</th>
                            <th width="1%"></th>
                            <th width="1%"></th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="category in categories" :class="{ 'removed' : post.removed }">
                            <td>{{ category.id }}</td>
                            <td>{{ category.name }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-default">Edit</button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-danger">Delete</button>
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
        name: 'picturesque-categories',

        components: {
            PicturesqueMenu
        },

        data() {
            return {
                categories: []
            }
        },

        ready () {
            this.fetchCategories()
        },

        methods: {

            fetchCategories () {
                let self = this
                self.$http.get('api/categories')
                    .then(function (response) {
                        self.categories = JSON.parse(response.data)
                    })
            },

        }

    }
</script>
