<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForgienKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        ################ CONTRACTS ###################
        Schema::table('contracts', function (Blueprint $table) {
            /* =========== user_id ===============*/ 
            $table->foreign("user_id")
            ->references('id')
            ->on("users")
            ->onDelete("cascade")       
            ->onUpdate("cascade");     
        });
        // ################ orders ###################
        Schema::table('orders', function (Blueprint $table) {
            /* =========== user_id ===============*/ 
            $table->foreign("user_id")
            ->references('id')
            ->on("users")
            ->onDelete("cascade")       
            ->onUpdate("cascade");     
            /* =========== payment_method_id ===============*/ 
            $table->foreign("payment_method_id")
            ->references('id')
            ->on("payment_methods")
            ->onDelete("cascade")       
            ->onUpdate("cascade");     
        });
        // ################ withdrawals ###################
        Schema::table('withdrawals', function (Blueprint $table) {
            /* =========== affiliator_id ===============*/ 
            $table->foreign("affiliator_id")
            ->references('id')
            ->on("affiliators")
            ->onDelete("cascade")       
            ->onUpdate("cascade");        
            /* =========== payment_method_id ===============*/ 
            $table->foreign("payment_method_id")
            ->references('id')
            ->on("payment_methods")
            ->onDelete("cascade")       
            ->onUpdate("cascade");        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
