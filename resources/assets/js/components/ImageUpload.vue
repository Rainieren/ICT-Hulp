<template>
    <input type="file" name="avatar" accept="image/*" @change="onChange">
</template>

<script>
    export default {
        methods: {
            onChange(e) {
                if (! e.target.files.length) return;


                let bestand = e.target.files[0];

                let lezer = new FileReader();

                lezer.readAsDataURL(bestand);

                lezer.onload = e => {
                    let src = e.target.result;

                    this.$emit('loaded', { src, bestand });

//                    this.avatar = e.target.result;
                };
            }
        }
    }
</script>