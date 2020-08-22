<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLedgersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ledgers', function (Blueprint $table) {
            $table->id();
            $table->string('ledger_name')->unique()->nullable(false);
            $table->string('billing_name')->unique()->nullable(false);


            $table->string('email')->nullable(true);
            $table->string('mobile1',15)->nullable(true);
            $table->string('mobile2',15)->nullable(true);

            $table->String('address1', 100)->nullable(true);
            $table->String('address2', 100)->nullable(true);
            $table->String('state', 50)->default('West Bengal')->nullable(true);
            $table->String('po', 50)->nullable(true);
            $table->String('area', 50)->nullable(true);
            $table->String('city', 50)->nullable(true);
            $table->String('pin', 10)->nullable(true);

            $table->enum('balance_type',[1,-1]);

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
        Schema::dropIfExists('ledgers');
    }
}
