<template>
    <div :id="'reply-' + id" class="card mb-3 card-custom">
        <div class="card-body">

            <div class="row">
                <div class="col-md-1 mr-2">
                    <img :src="avatar" class="rounded-circle" width="50" height="50">
                </div>
                <div class="col-md-10">
                    <div class="level">
                        <a :href="'/profiel/' + data.owner.username" v-text="data.owner.username" class="name-tag mr-1"></a> {{ data.created_at }}...

                        <div class="" v-if="canUpdate">
                            <button class="btn btn-sm btn-edit" @click="bewerken = true"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-sm btn-destroy" @click="destroy"><i class="fa fa-trash-o"></i></button>
                        </div>


                    </div>
                    <div v-if="bewerken">
                        <div class="form-group">
                            <textarea class="form-control" v-model="text" required rows="5"></textarea>
                        </div>

                        <button class="btn btn-sm btn-primary" @click="update">Bewerken</button>
                        <button class="btn btn-sm btn-link" @click="bewerken = false">Sluiten</button>
                    </div>
                    <div v-else v-text="text" class="mt-3"></div>

                    <div v-if="signedIn" class="mt-3">
                        <like :reply="data"></like>
                    </div>
                </div>


            </div>
        </div>
    </div>


</template>

<script>

    import Like from './Like.vue'

    export default {

        props: ['data', 'user'],

        components: { Like },

        data() {
            return {
                bewerken: false,
                id: this.data.id,
                text: this.data.text,
                avatar: ''
            };
        },

        computed: {
            signedIn() {
                return window.App.signedIn;
            },

            canUpdate() {
                return this.authorize(user => this.data.user_id == user.id);
//                return this.data.user_id == window.App.user.id;
            }
        },

        methods: {
            update() {
                axios.patch('/replies/' + this.data.id, {
                    text: this.text
                });

                this.bewerken = false;

                flash('Je reactie is bewerkt!');
            },

            destroy() {
                axios.delete('/replies/' + this.data.id);

                this.$emit('deleted', this.data.id);



            }
        }
    }
</script>