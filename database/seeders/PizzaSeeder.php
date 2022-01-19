<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pizza;
use Carbon\Carbon;

//WARNING: De CARBON::NOW methode geeft een uur eerder terug dan de huidige tijd. Geen idee hoe je dit solved.

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pizzas = [
            ['id' => 1, 'name' => 'Mozerella', 'isCustom' => 0],
            ['id' => 2, 'name' => 'Hawaii', 'isCustom' => 0],
            ['id' => 3, 'name' => 'Margerita', 'isCustom' => 0],
        ];

        foreach ($pizzas as $pizza) {
            Pizza::insert($pizza);
        }
    }
}
