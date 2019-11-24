<template>
  <div>
    <div v-if="isActive" >
        <div class="overlay" @click="isActive=false">
        </div>
        <div class="modal-wrapper">
            <div class="modal-card">
                <header class="modal-header">
                    <h2 class="modal-title">
                        <slot name="header"></slot>
                    </h2>
                </header>
                <main class="modal-body">
                    <slot name="content"></slot>
                </main>
                <footer class="modal-footer">
                    <slot name="footer"></slot>
                    <button type="button" class="ml-0-5 button is-info" @click="hideModal(modalName)">
                        Batal
                    </button>
                </footer>
            </div>
            <button class="modal-close is-large" aria-label="close" @click="isActive=false"></button>
        </div>
    </div>
  </div>
</template>

<script>
export default {
    props: {
        modalName: {
            type: String,
            required: true
        }
    },
    data() {
        return {
            isActive: false
        };
    },
    mounted() {
        Event.$on('show-modal', name => {
            this.showModal(name)
        });

        Event.$on('hide-modal', name => {
            this.hideModal(name)
        });
    },
    methods: {
        hasFooterSlot() {
            return !!this.$slots['footer']
        },
        showModal(name) {
            if (name === this.modalName) {
                this.isActive = true
            }
        },
        hideModal(name) {
            if (name === this.modalName) {
                this.isActive = false
            }
        }
    }
};
</script>

<style scoped>
.modal-card {
    border-radius: 10px 10px 10px 10px;
    border: 1px solid #dbdbdb;
    background: white;
    height:300px; 
    width:500px;
}

.modal-title {
    color: #363636;
    flex-grow: 1;
    flex-shrink: 0;
    font-size: 1.5rem;
    line-height: 1;
}

.modal-header {
    border-radius: 10px 10px 0 0;
    border-bottom: 1px solid #dbdbdb;
    align-items: center;
    background-color: #f5f5f5;
    display: flex;
    flex-shrink: 0;
    justify-content: flex-start;
    padding: 20px;
    position: relative;
}

.modal-body {
    background-color: #fff;
    min-height:160px;
    flex-grow: 1;
    flex-shrink: 1;
    overflow: auto;
    padding: 20px;
}

.modal-footer {
    border-top: 1px solid #dbdbdb;
    border-radius: 0 0 10px 10px;
    align-items: center;
    background-color: #f5f5f5;
    display: flex;
    flex-shrink: 0;
    justify-content: flex-end;
    padding: 20px;
    position: relative;
}

.modal-wrapper {
    z-index: 200;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
}

.overlay {
  position: fixed;
  top: 0;
  left: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.8);
  z-index: 100;
  transition: opacity 0.2s ease;
}
</style>