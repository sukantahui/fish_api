<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllProceduresAndFunctions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS getUsers;
                        CREATE PROCEDURE getUsers()
                        BEGIN
                            SELECT * FROM users;
                        END');
        DB::unprepared('DROP FUNCTION IF EXISTS get_purchase_amount_by_transaction_master_id;
            CREATE FUNCTION get_purchase_amount_by_transaction_master_id (temp_transaction_master_id bigint) RETURNS double
            READS SQL DATA
            DETERMINISTIC
            BEGIN
                DECLARE temp_purchase_master_id double;
                DECLARE total_bill_amount double;
                set total_bill_amount=0;
                select purchase_master_id into temp_purchase_master_id from transaction_masters where id=temp_transaction_master_id;

                IF isnull(temp_purchase_master_id) then
                    set total_bill_amount=0;
                    RETURN total_bill_amount;
                END IF;
                select sum(quantity*price-discount)  into total_bill_amount from purchase_details where purchase_master_id = temp_purchase_master_id;
                select total_bill_amount-discount-round_off+loading_n_unloading_expenditure  into total_bill_amount from purchase_masters where id = temp_purchase_master_id;

                RETURN total_bill_amount;
            END'
        );
        DB::unprepared('DROP FUNCTION IF EXISTS get_sale_amount_by_transaction_master_id;
            CREATE FUNCTION get_sale_amount_by_transaction_master_id (temp_transaction_master_id bigint) RETURNS double
            READS SQL DATA
            DETERMINISTIC
            BEGIN
                DECLARE temp_sale_master_id double;
                DECLARE total_bill_amount double;
                set total_bill_amount=0;
                select sale_master_id into temp_sale_master_id from transaction_masters where id=temp_transaction_master_id;

                IF isnull(temp_sale_master_id) then
                    set total_bill_amount=0;
                    RETURN total_bill_amount;
                END IF;
                select sum(quantity*price-discount)  into total_bill_amount from sale_details where sale_master_id = temp_sale_master_id;
                select total_bill_amount-discount-round_off+loading_n_unloading_expenditure  into total_bill_amount from sale_masters where id = temp_sale_master_id;

                RETURN total_bill_amount;
            END'
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('all_procedures_and_functions');
    }
}
