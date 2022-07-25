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
        Schema::create('glasses', function (Blueprint $table) {
            $table->id('id_glasses');
            $table->double('price');
            $table->unsignedBigInteger('id_employee');
            $table->unsignedBigInteger('id_category');
            $table->unsignedBigInteger('id_color');
            $table->unsignedBigInteger('id_type');
            $table->unsignedBigInteger('id_brand');

            $table->foreign('id_employee')->references('id_employee')->on('employees');
            $table->foreign('id_category')->references('id_category')->on('categories');
            $table->foreign('id_color')->references('id_color')->on('colors');
            $table->foreign('id_type')->references('id_type')->on('types');
            $table->foreign('id_brand')->references('id_brand')->on('brands');

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
        Schema::dropIfExists('glasses');
    }
};
