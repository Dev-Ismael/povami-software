<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');	
            $table->string('title' , 50);
            $table->string('content' , 4000);
            $table->float('price', 8, 2);
            $table->string('deadline' , 50);
            $table->tinyInteger('progress_bar');
            $table->string('project' , 200);
            $table->string('payment_system' , 200);
            $table->unsignedBigInteger('payment_method_id');	
            $table->integer('payment_status')->length(2);
            $table->string('coupon', 55); 
            $table->float('final_price', 8, 2);
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
        Schema::dropIfExists('orders');
    }
}
