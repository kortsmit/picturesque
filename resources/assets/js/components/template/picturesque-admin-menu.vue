*<template>
    <div class="col-md-2">
        <div class="list-group">
            <router-link
                to="/admin/posts"
                class="list-group-item">
                Posts
            </router-link>
            <router-link
                to="/admin/categories"
                class="list-group-item">
                Categories
            </router-link>
            <router-link
                to="/admin/photos"
                class="list-group-item">
                Photos
            </router-link>
            <router-link
                to="/admin/users"
                class="list-group-item">
                Users
            </router-link>
        </div>
    </div>
</template>

<script>
    export default{
        name: 'picturesque-admin-menu',

        data() {
            return {
                current: ''
            }
        },
    }
</script>
