<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_masters', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('voucher_id')->unsigned();
            $table ->foreign('voucher_id')->references('id')->on('vouchers');

            $table->bigInteger('purchase_master_id')->unsigned()->nullable();
            $table->foreign('purchase_master_id')->nullable()->references('id')->on('purchase_masters')->onDelete('cascade');

            $table->bigInteger('sale_master_id')->unsigned()->nullable();
            $table->foreign('sale_master_id')->nullable()->references('id')->on('sale_masters')->onDelete('cascade');

            $table->date('transaction_date');
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
        Schema::dropIfExists('transaction_masters');
    }
}
