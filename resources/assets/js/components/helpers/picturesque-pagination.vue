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
                           disabled="disabled"
                           @click.prevent="changePage(1)">
                            <i class="fa fa-angle-double-left"></i>
                        </a>
                    </li>
                    <li :class="{ 'disabled' : pagination.current_page == 1 }">
                        <a href="#" aria-label="Previous"

                           @click.prevent="changePage(pagination.current_page - 1)">
                            <i class="fa fa-angle-left mr5"></i> Previous
                        </a>
                    </li>
                    <li v-for="num in array" :class="{active: num == pagination.current_page}">
                        <a href="#" @click.prevent="changePage(num)">{{ num }}</a>
                    </li>
                    <li :class="{ 'disabled' : pagination.current_page == pagination.last_page }">
                        <a href="#" aria-label="Next" @click.prevent="changePage(pagination.current_page + 1)">
                            Next <i class="fa fa-angle-right ml5"></i>
                        </a>
                    </li>
                    <li :class="{ 'disabled' : pagination.current_page == pagination.last_page }">
                        <a href="#" aria-label="Last" @click.prevent="changePage(pagination.last_page)">
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
            array: function () {
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

                var arr = []
                while (from <=to) {
                    arr.push(from)
                    from++
                }

                return arr
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
                this.disableButtons()
                this.callback()
            },

            disableButtons: function () {

            }
        },
    }
</script>