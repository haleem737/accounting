<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('description');
            $table->string('paper')->nullable();
            $table->string('size')->nullable();
            $table->string('colors')->nullable();
            $table->string('copies')->nullable();
            $table->string('serial')->nullable();
            $table->string('pack')->nullable();
            $table->string('qty')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->decimal('cost', 10, 2)->nullable();
            
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
        Schema::dropIfExists('items');
    }
}
