<template>
    <div>
        <h3 class="fw-3" v-text="user.username"></h3>


        <form v-if="canUpdate" method="POST" enctype="multipart/form-data">
            <image-upload @loaded="onLoad"></image-upload>
        </form>



        <!--Bind de avatar naar wat de avatar is-->
        <img :src="avatar" class="rounded-circle profile-img" width="100">
    </div>
</template>

<script>

    import ImageUpload from './ImageUpload.vue';

    export default {

        props:  ['user'],

        components: { ImageUpload },

        data() {
            return {
                avatar: '/storage/' + this.user.avatar_path
            };
        },

        computed: {
            canUpdate() {
                return this.authorize(user => user.id === this.user.id)
            }
        },

        methods: {
            onLoad(avatar) {
                this.avatar = avatar.src;

                this.persist(avatar.bestand);
            },

            persist(bestand) {
                let data = new FormData();

                data.append('avatar', bestand);

                axios.post(`/gebruikers/${this.user.username}/avatar`, data).then(() => flash('Foto bewerkt!'));
            }
        }
    }
</script>