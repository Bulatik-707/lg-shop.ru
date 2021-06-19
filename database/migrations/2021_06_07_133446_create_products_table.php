<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('image');
            $table->decimal('price', 8, 2); // (общее количество цифр) и масштабом (десятичные цифры):
            $table->text('description'); 
            $table->foreignId('catalog_id')->constrained('catalogs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('color_id')->constrained('colors')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
