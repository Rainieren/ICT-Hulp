<template>
    <button type="submit" :class="classes" @click="toggle">
        <i class="fa fa-thumbs-o-up"></i> <span v-text="likesCount"></span>
    </button>
</template>

<script>
    export default {

        props: ['reply'],

        data() {
            return {
                likesCount: this.reply.likesCount,
                isLiked: this.reply.isLiked,
            }
        },

        computed: {
            classes() {
                return ['btn-notliked', this.isLiked ? 'btn-liked' : 'btn-both'];
            },

            eindpunt() {
                return '/replies/' + this.reply.id + '/likes';
            }
        },

        methods: {
           toggle() {
               this.isLiked ? this.destroy() : this.create();
           },

            create() {
                axios.post(this.eindpunt);

                this.isLiked = true;
                this.likesCount++;
            },

            destroy() {
                axios.delete(this.eindpunt);

                this.isLiked = false;
                this.likesCount--;
            }
        }
    }
</script>