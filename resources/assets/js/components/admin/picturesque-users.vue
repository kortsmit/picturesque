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
                    <tr v-for="user in users" :class="{ 'removed' : post.removed }">
                        <td>{{ user.id }}</td>
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
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
        name: 'users',

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
