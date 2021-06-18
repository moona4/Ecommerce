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
            $table->unsignedInteger('id');
            $table->primary('id');
            $table->integer('category_id');
            $table->integer('store_id');
            $table->string('name');
            $table->string('price');
            $table->string('image')->nullable();
            $table->longText('description')->nullable();
            $table->tinyInteger('status');
            $table->float('rating', 4, 2)->default(0.00);
            $table->string('rank')->default(0);
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
        Schema::dropIfExists('products');
    }
}
