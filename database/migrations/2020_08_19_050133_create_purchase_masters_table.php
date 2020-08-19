<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_masters', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number',20);
            $table->date('purchase_date');

            $table->bigInteger('vendor_id')->unsigned();
            $table ->foreign('vendor_id')->references('id')->on('users');

            $table->bigInteger('employee_id')->unsigned();
            $table ->foreign('employee_id')->references('id')->on('users');

            $table->decimal('discount')->default(0);
            $table->decimal('round_off')->default(0);
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
        Schema::dropIfExists('purchase_masters');
    }
}
