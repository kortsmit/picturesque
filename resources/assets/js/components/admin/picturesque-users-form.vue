<template>
    <section class="content">
        <h1>Users</h1>

        <div class="row">
            <picturesque-menu :current="users"></picturesque-menu>

            <div class="col-md-10">

                User ID is {{ $route.params.id }}

            </div>

        </div>
    </section>
</template>

<script>
    import PicturesqueMenu from './../template/picturesque-admin-menu.vue'

    export default {
        name: 'picturesque-users-form',

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
