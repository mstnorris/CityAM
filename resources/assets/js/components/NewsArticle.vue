<template>
    <div class="card">
        <div class="card-block">
            <h3 v-html="article.title" class="card-title"></h3>
            <div v-html="article.description" class="card-text">
        </div>
    </div>
</template>

<script>
    export default {
        props: ['article'],

        mounted() {
            console.log(this.article)
        }
    }
</script>
