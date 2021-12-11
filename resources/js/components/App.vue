<template>
    <div class="ي-flex" v-if="authUser">
        <div class="ي-flex overflow-y-hidden flex-1">

            <div class="overflow-x-hidden w-100">
                <router-view :key="$route.fullPath"></router-view>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex';

    export default {
        name: "App",

        components: {
        },

        mounted() {
            this.$store.dispatch('fetchAuthUser');
        },

        created() {
            this.$store.dispatch('setPageTitle', this.$route.meta.title);
        },

        computed: {
            ...mapGetters({
                authUser: 'authUser',
            }),
        },

        watch: {
            $route(to, from) {
                this.$store.dispatch('setPageTitle', to.meta.title);
            }
        }
    }
</script>

<style scoped>

</style>
