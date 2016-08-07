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
                            <th width="1%"></th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="user in users" :class="{ 'removed' : user.removed }">
                            <td>{{ user.id }}</td>
                            <td>{{ user.name }}</td>
                            <td>{{ user.email }}</td>
                            <td>
                                <a href="#" class="btn btn-secondary">Edit</a>
                            </td>
                            <td>
                                <a href="#" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>

        </div>
    </section>
</template>

<script>
    import PicturesqueMenu from './../template/picturesque-admin-menu.vue'

    export default {
        name: 'picturesque-users',

        components: {
            PicturesqueMenu
        },

        data() {
            return {
                users: []
            }
        },

        ready () {
            this.fetchUsers()
        },

        methods: {

            fetchUsers () {
                let self = this
                self.$http.get('api/users')
                    .then(function (response) {
                        self.users = JSON.parse(response.data)
                    })
            },

        }

    }
</script>
