<template>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button"
                        class="navbar-toggle collapsed"
                        data-toggle="collapse"
                        data-target="#navbar"
                        aria-expanded="false"
                        aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="https://www.github.com/kortsmit">kortsmit</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a v-link="{ path: '/' }">Home</a></li>
                    <li><a v-link="{ path: '/blog' }">Blog</a></li>
                    <li><a v-link="{ path: '/about' }">About</a></li>
                    <li><a v-link="{ path: '/contact' }">Contact</a></li>
                    <li><a v-link="{ path: '/admin' }">Admin</a></li>
                </ul>
            </div>
        </div>
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
