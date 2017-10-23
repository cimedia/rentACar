<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rent_history_', function (Blueprint $table) {
            $table->increments('id');
            $table->foreign('client_id')
                ->references('id')->on('clients_')
                ->onDelete('restrict');
            $table->foreign('car_id')
                ->references('id')->on('cars_')
                ->onDelete('restrict');
            $table->timestamp('rentDate')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('returnDate')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rent_history_');
    }
}
