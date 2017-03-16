<template>
    <section class="content">
        <h1>Users</h1>

        <div class="row">
            <picturesque-menu :current="users"></picturesque-menu>

            <div class="col-md-10">
                <table class="table table-hover">

                    <thead>
                        <tr>
                            <th width="1%">#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th width="1%"></th>
                            <th width="1%">
                                <router-link
                                    to="{ name: 'admin.users.create' }"
                                    class="btn btn-success">Create</router-link>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="user in users" :class="{ 'removed' : user.removed }">
                            <td>{{ user.id }}</td>
                            <td>{{ user.name }}</td>
                            <td>{{ user.email }}</td>
                            <td>
                                <router-link
                                   to="{ name: 'admin.users.edit', params: { id: user.id }}"
                                   class="btn btn-secondary">Edit</router-link>
                            </td>
                            <td>
                                <a href="#" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    </tbody>

                </table>

                <picturesque-pagination :pagination="pagination" :callback="fetchUsers"></picturesque-pagination>

            </div>

        </div>
    </section>
</template>

<script>
    import PicturesqueMenu from './../template/picturesque-admin-menu.vue'
    import PicturesquePagination from './../helpers/picturesque-pagination.vue'

    export default {
        name: 'picturesque-users',

        components: {
            PicturesqueMenu,
            PicturesquePagination
        },

        props: {
            loading: true,
        },

        data() {
            return {
                users: [],
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
            this.fetchUsers()
        },

        methods: {

            fetchUsers () {
                let self = this
                self.loading = true
                self.$http.get('api/users?page='+ self.pagination.current_page)
                        .then(function (response) {
                            self.users = response.data.data
                            self.makePagination(response.data)
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
