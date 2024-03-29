<template>
    <div class="bg-white rounded my-4 shadow col-8 mx-auto p-4">
        <div class="d-flex justify-content-between items-center">
            <div>
                <div class="w-8">
                    <img :src="authUser.data.attributes.profile_image.data.attributes.path"
                         alt="profile image for user" class="w-8 h-8 object-cover rounded-full">
                </div>
            </div>
            <div class="d-flex w-100 mx-2">
                <input v-model="postMessage" type="text" name="body"
                       class="form-control rounded"
                       placeholder="اضافة مشاركة">
                <transition name="fade">
                    <button v-if="postMessage"
                            @click="postHandler"
                            class="btn btn-info rounded mx-2">مشاركة
                    </button>
                </transition>
            </div>
            <div>
                <button ref="postImage" class="dz-clickable d-flex justify-content-center btn btn-sm items-center rounded" style="width: 40px;height: 40px;background: lightgray;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="2 0 20 22"
                         class="dz-clickable fill-current">
                        <path
                            d="M21.8 4H2.2c-.2 0-.3.2-.3.3v15.3c0 .3.1.4.3.4h19.6c.2 0 .3-.1.3-.3V4.3c0-.1-.1-.3-.3-.3zm-1.6 13.4l-4.4-4.6c0-.1-.1-.1-.2 0l-3.1 2.7-3.9-4.8h-.1s-.1 0-.1.1L3.8 17V6h16.4v11.4zm-4.9-6.8c.9 0 1.6-.7 1.6-1.6 0-.9-.7-1.6-1.6-1.6-.9 0-1.6.7-1.6 1.6.1.9.8 1.6 1.6 1.6z"/>
                    </svg>
                </button>
            </div>
        </div>

        <div class="dropzone-previews">
            <div id="dz-template" class="d-none">
                <div class="dz-preview dz-file-preview mt-4">
                    <div class="dz-details">
                        <img data-dz-thumbnail class="w-32 h-32">

                        <button data-dz-remove class="text-xs">احذف</button>
                    </div>
                    <div class="dz-progress"><span class="dz-upload" data-dz-upload></span></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import _ from 'lodash';
    import {mapGetters} from 'vuex';
    import Dropzone from 'dropzone';

    export default {
        name: "NewPost",

        data: () => {
            return {
                dropzone: null,
            };
        },

        mounted() {
            this.dropzone = new Dropzone(this.$refs.postImage, this.settings);
        },

        computed: {
            ...mapGetters({
                authUser: 'authUser',
            }),

            postMessage: {
                get() {
                    return this.$store.getters.postMessage;
                },
                set: _.debounce(function (postMessage) {
                    this.$store.commit('updateMessage', postMessage);
                }, 300),
            },

            settings() {
                return {
                    paramName: 'image',
                    url: process.env.MIX_APP_URL+'/admin/social/posts',
                    acceptedFiles: 'image/*',
                    clickable: '.dz-clickable',
                    autoProcessQueue: false,
                    maxFiles: 1,
                    previewsContainer: '.dropzone-previews',
                    previewTemplate: document.querySelector('#dz-template').innerHTML,
                    params: {
                        'width': 1000,
                        'height': 1000,
                    },
                    headers: {
                        'X-CSRF-TOKEN': document.head.querySelector('meta[name=csrf-token]').content,
                    },
                    sending: (file, xhr, formData) => {
                        formData.append('body', this.$store.getters.postMessage);
                    },
                    success: (event, res) => {
                        this.dropzone.removeAllFiles();

                        this.$store.commit('pushPost', res);
                    },
                    maxfilesexceeded: file => {
                        this.dropzone.removeAllFiles();
                        this.dropzone.addFile(file);
                    }
                };
            },
        },

        methods: {
            postHandler() {
                if (this.dropzone.getAcceptedFiles().length) {
                    this.dropzone.processQueue();
                } else {
                    this.$store.dispatch('postMessage');
                }

                this.$store.commit('updateMessage', '');
            }
        }
    }
</script>

<style scoped>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to {
        opacity: 0;
    }
</style>
