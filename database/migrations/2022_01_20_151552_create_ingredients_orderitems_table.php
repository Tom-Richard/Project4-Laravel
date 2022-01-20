<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientsOrderitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredients_orderitems', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orderitem_id')->nullable(true)->references('id')->on('orderitems')->cascadeOnDelete();
            $table->foreignId('ingredient_id')->nullable(true)->references('id')->on('ingredients')->cascadeOnDelete();
            $table->bigInteger('quantity')->nullable(false)->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredients_orderitems');
    }
}
