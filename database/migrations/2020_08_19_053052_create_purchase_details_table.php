<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('purchase_master_id')->unsigned();
            $table ->foreign('purchase_master_id')->references('id')->on('purchase_masters');

            $table->bigInteger('product_id')->unsigned();
            $table ->foreign('product_id')->references('id')->on('products');

            $table->bigInteger('unit_id')->unsigned();
            $table ->foreign('unit_id')->references('id')->on('units');

            $table->decimal('quantity')->default(0);
            $table->decimal('price')->default(0);
            $table->decimal('discount')->default(0);

            $table->tinyInteger('inforced')->default(1);
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
        Schema::dropIfExists('purchase_details');
    }
}
