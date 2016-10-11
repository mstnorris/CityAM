<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-4 col-sm-7 offset-sm-3 col-xs-12">
                <news-article class="card animated" transition="fade" v-for="article in articles" :article="article"></news-article>
                <infinite-loading :on-infinite="onInfinite" ref="infiniteLoading">
    <span slot="no-more">
      There is no more Hacker News :(
    </span>
                </infinite-loading>
            </div>
        </div>
    </div>
</template>

<script>
    import InfiniteLoading from 'vue-infinite-loading';

    export default {
        data() {
            return {
                articles: []
            };
        },

        components: {
            InfiniteLoading,
        },

        mounted() {
            console.log('Component ready.')
            this.getListOfArticles()
        },

        methods: {
            getListOfArticles() {
                this.$http.get('/api/articles')
                    .then(response => {
                        this.articles = response.data.articles
                        console.log(response.data.articles)
                    });
            },

            onInfinite() {
                this.$http.get('/api/articles', {
                    params: {
                        page: this.articles.length / 20 + 1,
                    },
                }).then((res) => {
                    if (res.data.hits.length) {
                        this.articles = this.articles.concat(res.data.hits);
                        this.$refs.infiniteLoading.$emit('$InfiniteLoading:loaded');
                        if (this.articles.length / 20 === 10) {
                            this.$refs.infiniteLoading.$emit('$InfiniteLoading:complete');
                        }
                    } else {
                        this.$refs.infiniteLoading.$emit('$InfiniteLoading:complete');
                    }
                });
            }
        }
    }
</script>
