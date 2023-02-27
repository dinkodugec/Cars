<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('car_id')->nullable();
            $table->unsignedBigInteger('categories_id')->nullable();
            $table->timestamps();

            $table->primary(['car_id', 'categories_id']);

            $table->foreign('car_id')
                    ->references('id')->on('cars')
                    ->onDelete('cascade');

            $table->foreign('categories_id')
                    ->references('id')->on('categories')
                    ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_categories');
    }
};
