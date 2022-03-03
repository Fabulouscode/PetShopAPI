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
            $table->increments('id');
            $table->string('category_uuid');
            $table->string('uuid', 255);
            $table->string('title');
            $table->float('price');
            $table->text('description');
            $table->json('metadata');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();

            $table->foreign('category_uuid')->references('uuid')->on('categories')->onDelete('restrict');
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
