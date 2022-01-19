<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdertransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordertransactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orderId')->nullable(false)->references('id')->on('orders')->cascadeOnDelete();
            $table->foreignId('employeeId')->nullable(false)->references('id')->on('employees')->cascadeOnDelete();
            $table->foreignId('toStatusId')->nullable(false)->references('id')->on('statuses')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordertransactions');
    }
}
