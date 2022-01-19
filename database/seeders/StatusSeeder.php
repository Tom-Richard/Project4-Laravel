<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::insert([
            'id' => '1',
            'name' => 'besteld',
        ]);

        Status::insert([
            'id' => '2',
            'name' => 'bereiden',
        ]);

        Status::insert([
            'id' => '3',
            'name' => 'oven',
        ]);

        Status::insert([
            'id' => '4',
            'name' => 'onderweg',
        ]);

        Status::insert([
            'id' => '5',
            'name' => 'bezorgd',
        ]);
    }
}
