<template>
  <div>
    <transition name="modalName">
      <div v-if="isOpen">
        <div class="overlay" @click.self="isOpen = false;">
            <div class="modal-body">
                <header>
                    <slot name="header"></slot>
                </header>
                <main>
                    <slot name="content"></slot>
                </main>
                <footer>
                    <slot name="footer"></slot>
                </footer>
            </div>
        </div>
      </div>
    </transition>
    <button class="button is-link" @click="isOpen = !isOpen;">
        <slot name="trigger"></slot>
    </button>
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
    data: function() {
        return {
        isOpen: false
        };
    }
};
</script>

<style scoped>
.modal-body {
    background: white;
    height:400px; 
    width:500px;
}
.fadeIn-enter {
  opacity: 0;
}

.fadeIn-leave-active {
  opacity: 0;
  transition: all 0.2s step-end;
}

.fadeIn-enter .modal,
.fadeIn-leave-active.modal {
  transform: scale(1.1);
}
button {
  padding: 7px;
  margin-top: 10px;
  background-color: green;
  color: white;
  font-size: 1.1rem;
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
  z-index: 999;
  transition: opacity 0.2s ease;
}
</style>