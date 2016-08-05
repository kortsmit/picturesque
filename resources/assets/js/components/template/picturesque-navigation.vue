<template>
    <nav class="navbar navbar-light bg-faded">
        <a class="navbar-brand" href="https://www.github.com/kortsmit">Kortsmit</a>
        <ul class="nav navbar-nav pull-xs-right">
            <li class="nav-item" :class="{ 'active' : v-link-active }">
                <a class="nav-link" v-link="{ path: '/' }">Home</a>
            </li>
            <li class="nav-item" :class="{ 'active' : v-link-active }">
                <a class="nav-link" v-link="{ path: '/blog' }" :class="{ 'active' : v-link-active }">Blog</a>
            </li>
            <li class="nav-item" :class="{ 'active' : v-link-active }">
                <a class="nav-link" v-link="{ path: '/about' }" :class="{ 'active' : v-link-active }">About</a>
            </li>
            <li class="nav-item" :class="{ 'active' : v-link-active }">
                <a class="nav-link" v-link="{ path: '/contact' }" :class="{ 'active' : v-link-active }">Contact</a>
            </li>
            <li class="nav-item" :class="{ 'active' : v-link-active }">
                <a class="nav-link" v-link="{ path: '/admin' }" :class="{ 'active' : v-link-active }">Admin</a>
            </li>
        </ul>
    </nav>
</template>

<script>
    export default {
        name: 'navigation',

        components: {

        },
        replace: false
    }
</script>
