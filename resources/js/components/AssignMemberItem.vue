<template>
    <div>
        <div class="columns">
            <div class="column is-1 is-flex justify-content-center align-items-center">
                <label style="width:100%;height:100%;" class="checkbox is-flex justify-content-center align-items-center">
                    <input type="checkbox" v-model="checked" @change="fillItem()">
                </label>
            </div>
            <div class="column is-2 is-flex align-items-center">
                <a :href="'/users/' + user.id" v-text="user.name"></a>
            </div>
            <div class="column is-2">
                <input type="text" class="input" v-model="role" @keyup="fillItem()">
            </div>
            <div class="column is-4 is-flex">
                <div class="is-flex align-items-center" v-for="skill in user.skills" :key="skill.id">
                    <button type="button" class="button is-small is-info mr-0-5">
                        <span v-text="skill.skill.name"></span>
                    </button>
                    <!-- <div class="ml-0-5 mr-1 is-flex align-items-center justify-content-center">
                        <span v-text="skill.level"></span><i class="material-icons has-text-warning">star</i>
                    </div> -->
                </div>
            </div>
        </div>    
    </div>    
</template>

<script>

    export default {
        name: "AssignMemberItem",
        props: {
            dataUser: {
                type: Object,
                required: true
            },
            projectId: {
                type: Number,
                required: true
            }
        },
        data() {
            return {
                item: {
                    project_id: this.projectId,
                    user_id: null,
                    role: null,
                },
                user: this.dataUser,
                role: null,
                checked: false,
            }
        },
        methods: {
            fillItem() {
                if(this.checked) {
                    this.$set(this.item, 'role', this.role)
                    this.$set(this.item, 'user_id', this.user.id)
                    this.$parent.selectedMembers.push(this.item)
                } else {
                    this.$set(this.item, 'role', null)
                    this.$set(this.item, 'user_id', null)
                }
            }
        }
    }
</script>