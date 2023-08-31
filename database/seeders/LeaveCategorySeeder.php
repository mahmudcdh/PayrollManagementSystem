<?php

namespace Database\Seeders;

use App\Models\LeaveCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LeaveCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['code' => 'CL',
                'details' => 'CASUAL LEAVE',
                'days' => 5,
                'remarks' => 'CASUAL LEAVE'],

            ['code' => 'SL',
            'details' => 'SICK LEAVE',
            'days' => 10,
            'remarks' => 'SICK LEAVE'],

            ['code' => 'EL',
                'details' => 'EARN LEAVE',
                'days' => 15,
                'remarks' => 'EARN LEAVE']
        ];
        LeaveCategory::insert($categories);
    }
}
