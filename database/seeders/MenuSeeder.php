<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;
use Carbon\Carbon;

//WARNING: De CARBON::NOW methode geeft een uur eerder terug dan de huidige tijd. Geen idee hoe je dit solved.

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            ['id' => 1, 'name' => 'Mozerella', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 2, 'name' => 'Hawaii', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 3, 'name' => 'Margerita', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}
