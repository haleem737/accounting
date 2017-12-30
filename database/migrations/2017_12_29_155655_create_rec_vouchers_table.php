<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rec_vouchers', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('amount', 10, 2);
            $table->text('being_for');
            $table->text('pay_method');
            
            $table->integer('order_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('customer_id')->references('id')->on('customers');
                        
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
        Schema::dropIfExists('rec_vouchers');
    }
}
