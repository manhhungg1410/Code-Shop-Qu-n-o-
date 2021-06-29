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
            $table->string('id');
            $table->primary('id');
            $table->unsignedInteger('details_type_products_id');
        //    $table->foreignId('details_type_products_id')->constrained('details_type_products')->onDelete('cascade');
            $table->string('name_product');
            $table->string('cover');
            $table->double('price_old');
            $table->integer('sale_off');
            $table->text('description');
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
