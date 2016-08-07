import Vue from 'vue'
import PicturesqueApp from './picturesque-app.vue'
import VueRouter from 'vue-router'
import VueResource from 'vue-resource'

Vue.use(VueRouter)
Vue.use(VueResource)

Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#csrf-token').getAttribute('value')

var router = new VueRouter()

router.map({
    '/': {
        component: require('./components/picturesque-home.vue')
    },
    '/blog': {
        component: require('./components/picturesque-blog.vue')
    },
    '/blog/posts/:slug': {
        name: 'post.show',
        component: {
            template: 'Post slug is {{ $route.params.slug }}'
        }
    },
    '/about': {
        component: require('./components/picturesque-about.vue')
    },
    '/contact': {
        component: require('./components/picturesque-contact.vue')
    },
    '/admin': {
        component: require('./components/picturesque-admin.vue')
    },
    '/admin/posts': {
        component: require('./components/admin/picturesque-posts.vue')
    },
    '/admin/posts/:id/edit': {
        name: 'admin.post.edit',
        component: require('./components/admin/picturesque-posts-form.vue')
    },
    '/admin/categories': {
        component: require('./components/admin/picturesque-categories.vue')
    },
    '/admin/photos': {
        component: require('./components/admin/picturesque-photos.vue')
    },
    '/admin/users': {
        component: require('./components/admin/picturesque-users.vue')
    },
})

router.start(PicturesqueApp, '#app')