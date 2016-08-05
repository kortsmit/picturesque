<template>
    <div id="pagination">
        <div class="row">
            <div class="col-md-3">
                <p class="pagination-showing">
                    Showing {{ pagination.from }} to {{ pagination.to }} of {{ pagination.total }}
                </p>
            </div>
            <div class="col-md-9">
                <ul class="pagination pull-right m0">
                    <li :class="{ 'disabled' : pagination.current_page == 1 }">
                        <a href="#" aria-label="First"
                           v-if="pagination.current_page !== 1"
                           @click.prevent="changePage(1)">
                            <i class="fa fa-angle-double-left"></i>
                        </a>
                        <a aria-label="First"
                           v-if="pagination.current_page == 1">
                            <i class="fa fa-angle-double-left"></i>
                        </a>
                    </li>
                    <li :class="{ 'disabled' : pagination.current_page == 1 }">
                        <a href="#" aria-label="Previous"
                           v-if="pagination.current_page !== 1"
                           @click.prevent="changePage(pagination.current_page - 1)">
                            <i class="fa fa-angle-left mr5"></i> Previous
                        </a>
                        <a aria-label="Previous"
                           v-if="pagination.current_page == 1">
                            <i class="fa fa-angle-left mr5"></i> Previous
                        </a>
                    </li>
                    <li v-for="page in pages" :class="{active: page == pagination.current_page}">
                        <a href="#" @click.prevent="changePage(page)">{{ page }}</a>
                    </li>
                    <li :class="{ 'disabled' : pagination.current_page == pagination.last_page }">
                        <a href="#" aria-label="Next"
                           v-if="pagination.current_page !== pagination.last_page"
                           @click.prevent="changePage(pagination.current_page + 1)">
                            Next <i class="fa fa-angle-right ml5"></i>
                        </a>
                        <a aria-label="Next"
                           v-if="pagination.current_page == pagination.last_page">
                            Next <i class="fa fa-angle-right ml5"></i>
                        </a>
                    </li>
                    <li :class="{ 'disabled' : pagination.current_page == pagination.last_page }">
                        <a href="#" aria-label="Last"
                           v-if="pagination.current_page !== pagination.last_page"
                           @click.prevent="changePage(pagination.last_page)">
                            <i class="fa fa-angle-double-right"></i>
                        </a>
                        <a aria-label="Last"
                           v-if="pagination.current_page == pagination.last_page">
                            <i class="fa fa-angle-double-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
   export default {
        name: 'picturesque-pagination',

        props: {
            pagination: {
                type: Object,
                required: true
            },
            callback: {
                type: Function,
                required: true
            },
            offset: {
                type: Number,
                default: 3
            }
        },

        computed: {
            pages: function () {
                if(! this.pagination.to) {
                    return []
                }

                var from = this.pagination.current_page - this.offset
                if(from < 1) {
                    from = 1
                }

                var to = from + (this.offset * 2);
                if(to >= this.pagination.last_page) {
                    to = this.pagination.last_page
                }

                var pages = []
                while (from <= to) {
                    pages.push(from)
                    from++
                }

                return pages
            }
        },

        watch: {
            'pagination.per_page': function () {
                this.callback()
            }
        },

        methods: {
            changePage: function (page) {
                this.$set('pagination.current_page', page)
                this.callback()
            }
        },
    }
</script>