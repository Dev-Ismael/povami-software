<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 55);
            $table->string('email' , 55)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('address' , 255 )->nullable();
            $table->string('phone' , 55 )->nullable();
            $table->string('balance', 10)->nullable();
            $table->string('coupon', 55)->nullable(); 
            $table->tinyInteger('role')->default('3');  // 1=> admin  ,  2=> affiliate  ,  3=> user
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
