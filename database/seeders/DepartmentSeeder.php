<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $depts = [
            ['dept_name' => 'Management', 'remarks' =>  'Company Management'],
            ['dept_name' => 'HR', 'remarks' =>  'Human Resource'],
            ['dept_name' => 'Operation', 'remarks' =>  'Operation'],
            ['dept_name' => 'Import', 'remarks' =>  'Import'],
            ['dept_name' => 'Export', 'remarks' =>  'Export'],
            ['dept_name' => 'Accounts', 'remarks' =>  'Accounts'],
        ];

        Department::insert($depts);
    }
}
