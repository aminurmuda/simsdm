<template>
    <div class="modal" :class="{'is-active':isActive}">
        <div class="modal-background"></div>
        <div class="modal-content">
            <slot name="main-content">
            </slot>
        </div>
        <button class="modal-close is-large" aria-label="close" @click="isActive=false"></button>
    </div>
</template>

<script>
    import Event from '../event'
    
    export default {
        name: "Modal",
        props:{
            name: {
                type: String,
                required: true
            },
        },
        data() {
            return {
                isActive: false
            }
        },
        methods:{
            hide(){
                Event.$emit('hide-scrollup-event', false);
                this.isActive = false;
            }
        },

        mounted() {
            Event.$on('show-modal', name => {
                if (name === this.name)
                    this.isActive = true

            });

            Event.$on('hide-modal', name => {
                if (name === this.name)
                    this.isActive = false
            });
        }
    }
</script>

<style scoped>

</style>