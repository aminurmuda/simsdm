<template>
    <div class="main" v-cloak>
        <sidebar-menu :menu="selectedRole" :width="'340px'" v-if="selectedRole"></sidebar-menu>
    </div>
</template>

<script>

    export default {
        name: "Sidebar",
        props: {
            currentRole: {
                type: Object,
                required: false,
                default: () => ({
                    id: 0,
                    name: 'Guest'
                }),
            },
            userProps: {
                type: Object,
                required: false,
                default: () => ({
                    id: 0,
                    name: 'Guest',
                    role_id: 0
                }),
            }
        },
        data() {
            return {
                selectedRole: null,
                roles: [
                    {
                        'role_id': 0,
                        'menu': [
                            {
                                header: true,
                                title: 'SIMSDM',
                                icon: 'fa fa-user',
                                hiddenOnCollapse: true
                            },
                            // {
                            //     href: '/',
                            //     title: 'Beranda',
                            //     icon: 'fa fa-home'
                            // },
                            {
                                href: '/login',
                                title: 'Login',
                                icon: 'fa fa-sign-in-alt',
                            },
                        ]
                    },
                    {
                        'role_id': 1,
                        'menu': [
                            {
                                header: true,
                                title: 'SIMSDM',
                                icon: 'fa fa-user',
                                hiddenOnCollapse: true
                            },
                            {
                                href: '/dashboard',
                                title: 'Dashboard',
                                icon: 'fa fa-chart-bar',
                            },
                            {
                                href: '/attendance_reports',
                                title: 'Kehadiran',
                                icon: 'fa fa-clock'
                            },
                            {
                                href: '/customers',
                                title: 'Customer',
                                icon: 'fa fa-users'
                            },
                            {
                                href: '/departments',
                                title: 'Departemen',
                                icon: 'fa fa-building'
                            },
                            {
                                href: '/divisions',
                                title: 'Divisi',
                                icon: 'fa fa-building'
                            },
                            {
                                href: '/paid_leaves',
                                title: 'Cuti',
                                icon: 'fa fa-tasks'
                            },
                            {
                                href: '/projects',
                                title: 'Proyek',
                                icon: 'fa fa-clipboard-list'
                            },
                            {
                                href: '/request_employees',
                                title: 'Permintaan',
                                icon: 'fa fa-user-friends'
                            },
                            {
                                href: '/users',
                                title: 'Karyawan',
                                icon: 'fa fa-user-circle'
                            },
                        ]
                    },
                    {
                        'role_id': 2,
                        'menu': [
                            {
                                header: true,
                                title: 'SIMSDM',
                                hiddenOnCollapse: true
                            },
                            {
                                href: '/dashboard',
                                title: 'Dashboard',
                                icon: 'fa fa-chart-bar'
                            },
                            {
                                href: '/projects',
                                title: 'Informasi Proyek',
                                icon: 'fa fa-clipboard-list'
                            },
                            {
                                href: '/request_employees',
                                title: 'Permintaan Bergabung',
                                icon: 'fa fa-user-friends',
                            },
                            {
                                
                                title: 'Lembur',
                                icon: 'fa fa-clock',
                                child: [
                                    {
                                        href: '/attendance_reports',
                                        title: 'Rekapitulasi Lembur',
                                        class:"pl-3"
                                    },
                                    {
                                        href: '/attendance_reports/create',
                                        title: 'Tambah Laporan Lembur',
                                        class: 'pl-3'
                                    }
                                ]
                            },
                            {
                                title: 'Cuti',
                                icon: 'fa fa-tasks',
                                child: [
                                    {
                                        href: '/paid_leaves',
                                        title: 'Rekapitulasi Cuti',
                                        class:"pl-3"
                                    },
                                    {
                                        href: '/paid_leaves/create',
                                        title: 'Buat Permohonan Cuti',
                                        class: 'pl-3'
                                    }
                                ]
                            },
                        ]
                    },
                    {
                        'role_id': 3,
                        'menu': [
                            {
                                header: true,
                                title: 'SIMSDM',
                                hiddenOnCollapse: true,
                                icon: 'fa fa-bars'
                            },
                            {
                                href: '/dashboard',
                                title: 'Dashboard',
                                icon: 'fa fa-chart-bar'
                            },
                            {
                                title: 'Kelola Proyek',
                                icon: 'fa fa-clipboard-list',
                                child: [
                                    {
                                        href: '/projects',
                                        title: 'Daftar Proyek',
                                        class: 'pl-3'
                                    },
                                    {
                                        href: '/projects/create',
                                        title: 'Tambah Proyek',
                                        class: 'pl-3'
                                    },
                                ]
                            },
                        ]
                    },
                    {
                        'role_id': 4,
                        'menu': [
                            {
                                header: true,
                                title: 'SIMSDM',
                                hiddenOnCollapse: true
                            },
                            {
                                href: '/dashboard',
                                title: 'Dashboard',
                                icon: 'fa fa-chart-bar'
                            },
                            {
                                href: '/users',
                                title: 'Daftar Karyawan Departemen ',
                                icon: 'fa fa-user-circle'
                            },
                            {
                                href: '/projects',
                                title: 'Proyek',
                                icon: 'fa fa-clipboard-list'
                            },
                            {
                                title: 'Kelola Permintaan Karyawan',
                                icon: 'fa fa-users',
                                child: [
                                    {
                                        href: '/request_employees?type=in',
                                        title: 'Daftar Permintaan Masuk',
                                        class:"pl-3"
                                    },
                                    {
                                        href: '/request_employees?type=out',
                                        title: 'Daftar Permintaan Keluar',
                                        class:"pl-3"
                                    },
                                    {
                                        href: '/request_employees/create',
                                        title: 'Buat Permohonan Pinjam Karyawan',
                                        class:"pl-3"
                                    },
                                ]
                            },
                            
                            {
                                href: '/paid_leaves',
                                title: 'Kelola Permohonan Cuti',
                                icon: 'fa fa-tasks'
                            },
                        ]
                    },
                    {
                        'role_id': 5,
                        'menu': [
                            {
                                header: true,
                                title: 'SIMSDM',
                                hiddenOnCollapse: true
                            },
                            {
                                href: '/dashboard',
                                title: 'Dashboard',
                                icon: 'fa fa-chart-bar'
                            },
                            {
                                href: '/projects',
                                title: 'Daftar Proyek',
                                icon: 'fa fa-clipboard-list'
                            },
                            {
                                href: '/attendance_reports',
                                title: 'Daftar Lembur Karyawan Proyek',
                                icon: 'fa fa-clock'
                            },
                            {
                                href: '/paid_leaves',
                                title: 'Kelola Permohonan Cuti',
                                icon: 'fa fa-tasks'
                            },
                        ]
                    }
                ]
                
            }
        },
        mounted() {
            if(this.currentRole && this.roles) {
                _.forEach(this.roles, (role) => {
                    if(role['role_id'] === this.currentRole.id) {
                        this.selectedRole = role['menu']
                    }
                })
            }
        },
        methods: {
        }
    }
</script>

<style>
    .v-sidebar-menu {
        max-width: 240px;
        background-color: #3b3838  !important;
    }

    .v-sidebar-menu.vsm_expanded {}
    .v-sidebar-menu.vsm_collapsed {}
    .v-sidebar-menu.vsm_rtl {}
    .v-sidebar-menu .vsm--item {}
    .v-sidebar-menu .vsm--item.vsm--item_open {}
    .v-sidebar-menu .vsm--link {}
    .v-sidebar-menu .vsm--link.vsm--link_active {}
    .v-sidebar-menu .vsm--link.vsm--link_exact-active {}
    .v-sidebar-menu .vsm--link.vsm--link_mobile-item {}
    .v-sidebar-menu .vsm--link.vsm--link_level-[n] {}
    .v-sidebar-menu .vsm--link.vsm--link_disabled {}
    .v-sidebar-menu .vsm--title {}
    .v-sidebar-menu .vsm--icon {}
    .v-sidebar-menu .vsm--arrow {}
    .v-sidebar-menu .vsm--arrow.vsm--arrow_open {}
    .v-sidebar-menu .vsm--badge {}
    .v-sidebar-menu .vsm--header {
        background-color: #1e1e21 !important;
        padding: 1rem 1rem;
        font-size: 1.5rem;
    }
    .v-sidebar-menu .vsm--list {}
    .v-sidebar-menu .vsm--dropdown>.vsm--list {}
    .v-sidebar-menu .vsm--mobile-item {}
    .v-sidebar-menu .vsm--mobile-bg {}
    .v-sidebar-menu .vsm--toggle-btn {}

</style>