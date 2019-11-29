<template>
    <div>
        <div class="field is-grouped">
            <div class="control is-flex align-items-center is-size-7">            
                Login sebagai
            </div>
            <div class="control">
                <div class="select is-small">
                    <select style="border:0px;" v-model="selectedRole" @change="changeRole()">
                        <option :value="list.role" v-for="list in roles" :key="list.role.id" v-text="list.role.name"></option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        name: "ChangeRole",
        props: {
            currentRole: {
                type: Object,
                required: true
            },
            roles: {
                type: Array,
                required: true
            },
            userProps: {
                type: Object,
                required: true
            }
        },
        data() {
            return {
                user: this.userProps,
                selectedRole: this.currentRole,
                form: {}
            }
        },
        methods: {
            buildForm() {
                this.form = {
                    'role_id':this.selectedRole.id
                }
            },
            changeRole() {
                this.buildForm()
                axios.put('/users/' + this.user.id + '/store_change_role', this.form)
                .then((result) => {
                    this.user = result.data
                    console.log("user's role changed successfully")
                    window.location.reload()
                }).catch((error) => {
                    console.log(error)
                })
            }
        }
    }
</script>