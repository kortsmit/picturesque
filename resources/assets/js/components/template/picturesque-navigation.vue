<template>
    <nav class="navbar navbar-light bg-faded">
        <a class="navbar-brand" href="https://www.github.com/kortsmit">Kortsmit</a>
        <ul class="nav navbar-nav pull-xs-right">
            <li class="nav-item">
                <router-link
                    class="nav-link"
                    to="/"
                    tag="li">
                    Home
                </router-link>
            </li>
            <li class="nav-item">
                <router-link
                    class="nav-link"
                    to="/blog"
                    tag="li">
                    Blog
                </router-link>
            </li>
            <li class="nav-item">
                <router-link
                    class="nav-link"
                    to="/about"
                    tag="li">
                    About
                </router-link>
            </li>
            <li class="nav-item">
                <router-link
                    class="nav-link"
                    to="/contact"
                    tag="li">
                    Contact
                </router-link>
            </li>
            <li class="nav-item">
                <router-link
                    class="nav-link"
                    to="/admin"
                    tag="li">
                    Admin
                </router-link>
            </li>
        </ul>
    </nav>
</template>

<script>
    export default {
        name: 'navigation',

        components: {

        }
    }
</script>
