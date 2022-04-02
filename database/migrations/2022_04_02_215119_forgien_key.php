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
