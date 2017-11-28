<template>
    <transition name="bounce" >
        <div class="alert alert-success alert-style z-depth-5" role="alert" v-show="show">
            <div class="col-md-2">
                <i class="fa fa-smile-o flash-succes"></i>
            </div>
            <div class="col-md-10" style="">
                <h5 class="mb-0">Succes!</h5><p class="mb-0">{{ bericht_body }}</p>
            </div>
        </div>
    </transition>

</template>

<script>
    export default {

        props: ['bericht'],

        data() {
           return {
               bericht_body: '',
               show: false
           }
        },

        created() {
            if (this.bericht) {
                this.flash(this.bericht);
            }

            window.events.$on('flash', bericht => this.flash(bericht));
        },

        methods: {
            flash(bericht) {
                this.bericht_body = bericht;
                this.show = true;

                this.hide();
            },

            hide() {
                setTimeout(() => {
                    this.show = false;
                }, 3000);
            }
        }
    }
</script>


<style>

    .z-depth-5 {
        box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.3);
    }

    .flash-succes {
        font-size: 42px;
        position: relative;
        margin-top: 2px;
        left: -10px;
        color: limegreen;
    }

    .alert-style {
        position: fixed;
        right: 25px;
        bottom: 25px;
        margin-right: 15px;
        color: black;
        border: none;
        border-radius: 50px;
        background-color: white;
    }

    .bounce-enter-active {
        animation: bounce-in .5s;
    }
    .bounce-leave-active {
        animation: bounce-in .5s reverse;
    }
    @keyframes bounce-in {
        0% {
            transform: scale(0);
        }
        50% {
            transform: scale(1.5);
        }
        100% {
            transform: scale(1);
        }
    }

    .slide-fade-enter-active {
        transition: all .3s ease;
    }
    .slide-fade-leave-active {
        transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    }
    .slide-fade-enter, .slide-fade-leave-to
        /* .slide-fade-leave-active below version 2.1.8 */ {
        transform: translateX(10px);
        opacity: 0;
    }
</style>