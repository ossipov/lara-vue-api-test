<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');
            $table->integer('price');
            $table->tinyInteger('bedrooms');
            $table->tinyInteger('bathrooms');
            $table->tinyInteger('storeys');
            $table->tinyInteger('garages');
            $table->timestamps();

        });

        Artisan::call('db:seed', [
            '--class' => PropertySeeder::class
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
