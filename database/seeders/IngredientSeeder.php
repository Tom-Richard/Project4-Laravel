<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ingredients = [
            ['id' => 1, 'ingredient' => 'Bodemdeeg', 'price100g' => '0.50'],
            ['id' => 2, 'ingredient' => 'Mozerella', 'price100g' => '2.50'],
            ['id' => 3, 'ingredient' => 'Saus', 'price100g' => '0.25'],
            ['id' => 4, 'ingredient' => 'Ui', 'price100g' => '0.50'],
            ['id' => 5, 'ingredient' => 'Tomaat', 'price100g' => '0.80'],
            ['id' => 6, 'ingredient' => 'Kaas', 'price100g' => '0.40'],
            ['id' => 7, 'ingredient' => 'Ananas', 'price100g' => '0.90'],
            ['id' => 8, 'ingredient' => 'Ham', 'price100g' => '1.20'],
        ];

        foreach ($ingredients as $ingredient) {
            Ingredient::create($ingredient);
        }
    }
}
