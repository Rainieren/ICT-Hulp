<template>
    <div v-if="signedIn">
        <div class="form-group">
            <textarea name="text" id="" rows="7" class="form-control" placeholder="Iets te zeggen?" v-model="text" required></textarea>
        </div>
        <button type="submit" class="btn btn-theme btn-hover float-right" @click="addReply">Plaatsen</button>
    </div>

    <div class="row" v-else>
        <div class="col-md-12">
            <p class="text-center"><a href="/login">Login</a> om mee tee doen aan deze discussie</p>
        </div>
    </div>


</template>

<script>
    export default {

        props: ['endpoint'],

        data() {
            return {
                text: '',
            }
        },

        computed: {
            signedIn() {
                return window.App.signedIn;
            }
        },

        methods: {
            addReply() {
                axios.post(this.endpoint, { text: this.text }).then(({data}) => {
                    this.text = '';

                    flash('Je reactie is geplaatst!');

                    this.$emit('created', data);
                });
            }
        }
    }
</script>