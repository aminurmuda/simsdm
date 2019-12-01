/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
import vSelect from 'vue-select'
    
// import VueSidebarMenu from 'vue-sidebar-menu'
// import 'vue-sidebar-menu/dist/vue-sidebar-menu.css'
// Vue.use(VueSidebarMenu)

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('welcome', require('./components/Welcome.vue').default);
Vue.component('dashboard', require('./components/Dashboard.vue').default);
Vue.component('chartjs', require('./components/Chartjs.vue').default);
Vue.component('modal', require('./components/Modal.vue').default);
Vue.component('sidebar', require('./components/Sidebar.vue').default);
Vue.component('sidebar-menu', require('./components/sidebar/SidebarMenu.vue').default);
Vue.component('sidebar-menu-item', require('./components/sidebar/SidebarMenuItem.vue').default);
Vue.component('change-role', require('./components/ChangeRole.vue').default);
Vue.component('navbar', require('./components/Navbar.vue').default);
Vue.component('assign-member', require('./components/AssignMember.vue').default);
Vue.component('assign-member-item', require('./components/AssignMemberItem.vue').default);
Vue.component('request-employee', require('./components/RequestEmployee.vue').default);
Vue.component('request-employee-item', require('./components/RequestEmployeeItem.vue').default);
Vue.component('v-select', vSelect);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Event = new Vue()


const app = new Vue({
    el: '#app',
    methods: {
        showModal(name) {
            Event.$emit('show-modal', name)
        },
        hideModal(name) {
            console.log('app js hide modal')
            Event.$emit('hide-modal', name)
        }
    }
});

