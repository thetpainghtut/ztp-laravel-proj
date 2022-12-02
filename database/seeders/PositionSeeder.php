<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->insert(
            [
                'name' => 'HR',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('positions')->insert(
            [
                'name' => 'Marketing',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
