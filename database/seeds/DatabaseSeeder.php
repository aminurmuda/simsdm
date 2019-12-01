<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(AttendanceReportStatusesTableSeeder::class);
        $this->call(EmployeeStatusesTableSeeder::class);
        $this->call(PaidLeaveStatusesTableSeeder::class);
        $this->call(PaidLeaveTypesTableSeeder::class);
        $this->call(ProjectStatusesTableSeeder::class);
        $this->call(RequestStatusesTableSeeder::class);
        $this->call(RequestTypesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(SkillsTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RoleListsTableSeeder::class);
    }
}
