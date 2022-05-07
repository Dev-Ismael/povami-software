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
            $table->string('first_name' , 55)->nullable();
            $table->string('last_name' , 55)->nullable();
            $table->string('email' , 55)->unique();
            $table->string('password');
            $table->string('address' , 255 )->nullable();
            $table->string('phone' , 55 )->nullable();
            $table->string('phone2' , 55 )->nullable();
            $table->string('facebook' , 255 )->nullable();
            $table->string('twitter' , 255 )->nullable();
            $table->string('instagram' , 255 )->nullable();
            $table->string('country' , 55)->nullable();
            $table->string('city' , 55)->nullable();
            $table->string('balance', 20)->default('0');
            $table->string('coupon', 10)->nullable();
            $table->string('role', 1 )->default('3'); // 1=> admin  ,  2=> affiliator  ,  3=> user
            $table->timestamp('email_verified_at')->nullable();
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
