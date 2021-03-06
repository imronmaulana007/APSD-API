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
            $table->unsignedBigInteger('id_category');
            $table->string('product_name', 100);
            $table->string('photo', 225);
            $table->integer('stock');
            $table->string('description', 225);
            $table->double('price', 12, 2);
            $table->integer('weight');
            $table->integer('long');
            $table->integer('heigt');
            $table->integer('wide');
            $table->integer('status');
            $table->timestamps();

            // $table->foreign('id_category')->references('id')->on('categories')
            // ->onDelete('cascade');
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
