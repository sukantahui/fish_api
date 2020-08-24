<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_details', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('sale_master_id')->unsigned();
            $table ->foreign('sale_master_id')->references('id')->on('sale_masters');

            $table->bigInteger('product_id')->unsigned();
            $table ->foreign('product_id')->references('id')->on('products');

            $table->bigInteger('unit_id')->unsigned();
            $table ->foreign('unit_id')->references('id')->on('units');

            $table->decimal('quantity')->default(0);
            $table->decimal('price')->default(0);
            $table->decimal('discount')->default(0);

            $table->tinyInteger('inforce')->default(1);
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
        Schema::dropIfExists('sale_details');
    }
}
