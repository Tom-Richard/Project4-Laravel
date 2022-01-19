<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;
use App\Models\Ingredient;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unit::create([
            'id' => '1',
            'name' => '100gr',
        ]);

        Unit::create([
            'id' => '2',
            'name' => '1 stuk',
        ]);

        Unit::create([
            'id' => '3',
            'name' => '100ml',
        ]);
    }
}
