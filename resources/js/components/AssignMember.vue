<script>

    export default {
        name: "AssignMember",
        props: {
            users: {
                type: Array,
                required: true
            },
            project: {
                type: Object,
                required: true
            }
        },
        data() {
            return {
                selectedMembers: [],
            }
        },
        methods: {
            submit() {
                this.selectedMembers = _.uniq(this.selectedMembers)
                let form = {'selected_members': this.selectedMembers}
                axios.put('/projects/' + this.project.id + '/store-assign-member', form)
                .then((result) => {
                    window.location.href = '/projects/' + this.project.id
                }).catch((error) => {
                    console.log(error)
                })
            }
        }
    }
</script>