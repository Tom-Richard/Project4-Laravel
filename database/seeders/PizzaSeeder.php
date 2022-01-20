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
            ['id' => 1, 'name' => 'Mozerella'],
            ['id' => 2, 'name' => 'Hawaii'],
            ['id' => 3, 'name' => 'Margerita'],
        ];

        foreach ($pizzas as $pizza) {
            Pizza::insert($pizza);
        }
    }
}
