<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePizzaIngredientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pizza_ingredient', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pizzaId')->nullable(false)->references('id')->on('pizzas')->cascadeOnDelete();
            $table->foreignId('ingredientId')->nullable(false)->references('id')->on('ingredients')->cascadeOnDelete();
            $table->bigInteger('quantity')->nullable(false)->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pizza_ingredient');
    }
}
