<template>
    <section class="content">
        <h1>Photos</h1>

        <div class="row">
            <picturesque-menu :current="posts"></picturesque-menu>

            <div class="col-md-10">

                Photo ID is {{ $route.params.id }}

            </div>

        </div>
    </section>
</template>

<script>
    import PicturesqueMenu from './../template/picturesque-admin-menu.vue'

    export default {
        name: 'picturesque-photos-form',

        components: {
            PicturesqueMenu
        },

        props: {
            loading: true,
        },

        data() {
            return {
                photos: [],
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
            this.fetchPhotos()
        },

        methods: {

            fetchPhotos () {
                let self = this
                self.$http.get('api/photos')
                    .then(function (response) {
                        self.photos = response.data.data
                    })
            },

        }

    }
</script>
