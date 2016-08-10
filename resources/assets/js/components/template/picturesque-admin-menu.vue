*<template>
    <div class="col-md-2">
        <div class="list-group">
            <a v-link="{ path: '/admin/posts' }"
               class="list-group-item"
               :class="{ 'active' : v-link-active }">
                Posts
            </a>
            <a v-link="{ path: '/admin/categories' }"
               class="list-group-item"
               :class="{ 'active' : v-link-active }">
                Categories
            </a>
            <a v-link="{ path: '/admin/photos' }"
               class="list-group-item"
               :class="{ 'active' : v-link-active }">
                Photos
            </a>
            <a v-link="{ path: '/admin/users' }"
               class="list-group-item"
               :class="{ 'active' : v-link-active }">
                Users
            </a>
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
