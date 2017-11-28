<script>

    import Replies from '../components/Replies.vue';

    export default {

        props: ['ReplyCount'],

        components: { Replies },

        data() {
            return {
                repliesCount: this.ReplyCount
            };
        }
    }
</script>