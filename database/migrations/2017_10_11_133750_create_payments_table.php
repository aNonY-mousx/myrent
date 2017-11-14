<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('RoomNo');           
            $table->integer('rent');
            $table->integer('eunit_before');            
            $table->integer('eunit_now');
            $table->integer('e_cost');
            $table->integer('advance');
            $table->integer('due');
            $table->string('paid_to');
            $table->integer('paid_amount');           
            $table->dateTime('payment_done_at'); 
            $table->dateTime('electricity_paid_upto');
            $table->dateTime('rent_paid_upto');
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
        Schema::dropIfExists('payments');
    }
}
