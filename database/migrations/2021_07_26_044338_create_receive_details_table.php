<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiveDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receive_details', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_no', 100);
            $table->integer('product_id')->unsigned();
            $table->float('qty')->unsigned();
            $table->float('price')->unsigned();
            $table->float('discount')->unsigned();
            $table->float('total_price')->unsigned();
            $table->date('date');
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
        Schema::dropIfExists('receive_details');
    }
}
