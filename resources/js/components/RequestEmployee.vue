<template>
    <div class="my-1">
        <div class="box">
            <!-- <div class="field">
                <div class="control">
                    <label class="label">
                        Pilih Jenis Karyawan
                    </label>
                    <div class="select is-fullwidth">
                        <select v-model="requestStatusId">
                            <option value=null disabled=true selected>-- Pilih Status Karyawan --</option>
                            <option :value="status.id" v-text="status.name" v-for="status in statuses" :key="status.id"></option>
                        </select>
                    </div>
                </div>
            </div> -->
            <div class="field">
                <div class="control">
                    <label class="label">
                        Pilih Jenis Permintaan
                    </label>
                    <div class="select is-fullwidth">
                        <select v-model="selectedType">
                            <option value="null" disabled=true selected>-- Pilih Tipe Request --</option>
                            <option :value="type.id" v-text="type.name" v-for="type in types" :key="type.id"></option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="field mt-1">
                <div class="control">
                    <label class="label">
                        Pilih Skill
                    </label>
                    <v-select v-model="selectedSkills" multiple label="name" :placeholder="'Skill yang dicari'" :options="skills"></v-select>
                </div>
            </div>
            <button class="button is-link is-fullwidth" @click="search()">Cari Karyawan</button>
        </div>
        
        <div class="box mt-1" v-if="employees.length > 0">
            <div class="columns" style="background:#D3DCE3;">
                <div class="column is-1 is-flex justify-content-center align-items-center">
                    
                </div>
                <div class="column is-3 has-text-weight-bold">
                    Nama Karyawan
                </div>
                <div class="column is-1 has-text-weight-bold">
                    Departemen
                </div>
                <div class="column is-2 has-text-weight-bold">
                    Role
                </div>
                <div class="column is-4 has-text-weight-bold">
                    Skill
                </div>
            </div>
            <request-employee-item :data-user="user" v-for="user in employees" :key="user.id"></request-employee-item>
        </div>

        <div class="box mt-1">
            <div class="field">
                <div class="control">
                    <label class="label">
                        Pilih Proyek
                    </label>
                    <div class="select is-fullwidth">
                        <select v-model="selectedProject" @change="fillDate()">
                            <option value="null" disabled=true selected>-- Pilih Proyek --</option>
                            <option :value="project" v-text="project.name" v-for="project in projects" :key="project.id"></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <div class="columns">
                        <div class="column is-6">
                            <label class="label">
                                Tanggal Mulai
                            </label>
                            <input type="date" class="input" v-model="startDate" name="start_date">
                        </div>
                        <div class="column is-6">    
                            <label class="label">
                                Tanggal Selesai
                            </label>                    
                            <input type="date" class="input" v-model="endDate" name="end_date">
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="button is-primary" @click="submit">Buat</button>
        </div>

    </div>
</template>

<script>

import vSelect from 'vue-select'
    export default {
        name: "RequestEmployee",
        props: {
            skills: {
                type: Array,
                required: true
            },
            statuses: {
                type: Array,
                required: true
            },
            projects: {
                type: Array,
                required: true
            },
            types: {
                type: Array,
                required: true
            }
        },
        data() {
            return {
                requestStatusId: null,
                selectedSkills: [],
                selectedProject: null,
                selectedType: null,
                selectedEmployees: [],
                employees: [],
                startDate: null,
                endDate: null
            }
        },
        methods: {
            search() {
                let url = '/search_employee' 
                let query = '?';
                if(this.selectedType) {
                    query += 'request_status_id=' + this.selectedType
                }
                if(this.selectedSkills.length > 0) {
                    let skillIds = this.selectedSkills.map(skill => skill.id)
                    let skill = skillIds.join(';')
                    query += '&skill=' + skill
                }

                axios.get(url + query).then((result) => {
                    this.employees = _.uniqBy(result.data.users, function (user) {
                        return user.id;
                    });
                }).catch((error) => {
                    console.log(error)
                })
            },
            fillDate() {
                this.startDate = this.selectedProject.start_date
                this.endDate = this.selectedProject.end_date
            },
            submit() {
                this.selectedEmployees = _.uniq(this.selectedEmployees)
                let form = {
                    'start_date': this.startDate,
                    'end_date': this.endDate,
                    'project_id': this.selectedProject.id,
                    'type_id': this.selectedType,
                    'role': 'required',
                    'selected_employees': this.selectedEmployees,
                }
                axios.put('/request_employees/' + this.selectedProject.id + '/store-request-employees', form)
                .then((result) => {
                    console.log(result.data)
                    window.location.href = '/request_employees?type=out'
                }).catch((error) => {
                    console.log(error)
                })
            }
        }
    }
</script>

<style>
    .vs__open-indicator {
    fill: #3490dc !important;
    }

    .vs__deselect {
        fill: red !important;
    }
    .vs__search {
        color: lightgrey;
    }
    .vs__selected {
        background-color: hsl(0, 0%, 98%);
        padding: 0.5rem;
        margin: 0.5rem 0.2rem 0.2rem 0.2rem;
    }
</style>