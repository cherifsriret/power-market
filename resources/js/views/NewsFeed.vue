<template>
    <div class="flex flex-col items-center py-4">
        <NewPost />


        <div v-if="posts">
                <p v-if="newsStatus.postsStatus === 'loading'">Loading posts...</p>
                <Post v-else v-for="(post, postKey) in posts.data" :key="postKey" :post="post" />
        </div>
        <p  v-else>Loading posts...</p>


    </div>
</template>

<script>
    import { mapGetters } from 'vuex';
    import NewPost from '../components/NewPost';
    import Post from '../components/Post';

    export default {
        name: "NewsFeed",

        components: {
            NewPost,
            Post,
        },

        mounted() {
            this.$store.dispatch('fetchNewsPosts');
        },

        computed: {
            ...mapGetters({
                posts: 'posts',
                newsStatus: 'newsStatus',
            })
        }
    }
</script>

<style scoped>

</style>
