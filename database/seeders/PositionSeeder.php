<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positions = [
            ['position' => 'Managing Director', 'remarks' =>  'Managing Director'],
            ['position' => 'Director', 'remarks' =>  'Director'],
            ['position' => 'Executive Director', 'remarks' =>  'Executive Director'],
            ['position' => 'Manager', 'remarks' =>  'Manager'],
            ['position' => 'Asst. Manager', 'remarks' =>  'Asst. Manager'],
            ['position' => 'Sr. Executive', 'remarks' =>  'Sr. Executive'],
            ['position' => 'Executive', 'remarks' =>  'Executive'],
            ['position' => 'Jr. Executive', 'remarks' =>  'Jr. Executive'],
            ['position' => 'Office Assistant', 'remarks' =>  'Office Assistant'],
            ['position' => 'Driver', 'remarks' =>  'Driver'],
        ];

        Position::insert($positions);
    }
}
