<template>
    <div class="row">
        <div class="col-md-3">
            <p style="margin:1rem 0">
                Showing {{ pagination.from }} to {{ pagination.to }} of {{ pagination.total }}
            </p>
        </div>
        <div class="col-md-9">
            <nav class="pull-xs-right">
                <ul class="pagination">
                    <li :class="{ 'disabled' : pagination.current_page == 1 }" class="page-item">
                        <a href="#" aria-label="First" class="page-link"
                           v-if="pagination.current_page !== 1"
                           @click.prevent="changePage(1)">
                            &laquo;
                        </a>
                        <a aria-label="First" class="page-link"
                           v-if="pagination.current_page == 1">
                            &laquo;
                        </a>
                    </li>
                    <li :class="{ 'disabled' : pagination.current_page == 1 }" class="page-item">
                        <a href="#" aria-label="Previous" class="page-link"
                           v-if="pagination.current_page !== 1"
                           @click.prevent="changePage(pagination.current_page - 1)">
                            <i class="fa fa-angle-left mr5"></i> Previous
                        </a>
                        <a aria-label="Previous" class="page-link"
                           v-if="pagination.current_page == 1">
                            <i class="fa fa-angle-left mr5"></i> Previous
                        </a>
                    </li>
                    <li v-for="page in pages" :class="{active: page == pagination.current_page}" class="page-item">
                        <a href="#" @click.prevent="changePage(page)" class="page-link">{{ page }}</a>
                    </li>
                    <li :class="{ 'disabled' : pagination.current_page == pagination.last_page }" class="page-item">
                        <a href="#" aria-label="Next" class="page-link"
                           v-if="pagination.current_page !== pagination.last_page"
                           @click.prevent="changePage(pagination.current_page + 1)">
                            Next <i class="fa fa-angle-right ml5"></i>
                        </a>
                        <a aria-label="Next" class="page-link"
                           v-if="pagination.current_page == pagination.last_page">
                            Next <i class="fa fa-angle-right ml5"></i>
                        </a>
                    </li>
                    <li :class="{ 'disabled' : pagination.current_page == pagination.last_page }" class="page-item">
                        <a href="#" aria-label="Last" class="page-link"
                           v-if="pagination.current_page !== pagination.last_page"
                           @click.prevent="changePage(pagination.last_page)">
                            &raquo;
                        </a>
                        <a aria-label="Last" class="page-link"
                           v-if="pagination.current_page == pagination.last_page">
                            &raquo;
                        </a>
                    </li>
                </ul>
            </nav>
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
                this.$set(this.pagination, 'current_page', page)
                this.callback()
            }
        },
    }
</script>