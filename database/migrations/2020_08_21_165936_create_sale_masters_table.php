<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_masters', function (Blueprint $table) {
            $table->id();
            $table->string('bill_number',20)->unique();

            $table->bigInteger('customer_id')->unsigned();
            $table ->foreign('customer_id')->references('id')->on('users');

            $table->bigInteger('employee_id')->unsigned();
            $table ->foreign('employee_id')->references('id')->on('users');

            $table->date('sale_date');

            $table->string('description',255);
            $table->decimal('discount')->default(0);
            $table->decimal('round_off')->default(0);

            $table->tinyInteger('inforce')->default(0);
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
        Schema::dropIfExists('sale_masters');
    }
}
