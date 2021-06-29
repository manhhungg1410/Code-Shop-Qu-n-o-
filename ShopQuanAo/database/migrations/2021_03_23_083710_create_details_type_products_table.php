<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTypeProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details_type_products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('type_products_id');
            $table->foreign('type_products_id')
                ->references('id')
                  ->on('type_products')
                  ->onDelete('cascade');
            $table->string('details_name_type');
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
        Schema::dropIfExists('details_type_products');
    }
}
