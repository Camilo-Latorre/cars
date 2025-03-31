<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
        $table->bigIncrements('id_car');
        $table->string('car_make');
        $table->string('car_model');
        $table->integer('car_year');
        $table->double('car_price');
        $table->string('car_status')->default('available'); // Restricción: 'available' como valor por defecto
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
