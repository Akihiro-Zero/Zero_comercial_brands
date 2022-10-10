<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('name');
            $table->string('password');
            $table->string('email')->unique();
            $table->string('city')->nullable();
            $table->string('bank')->nullable();
            $table->string('e_ktp')->nullable();
            $table->string('phone')->nullable();
            $table->string('image')->nullable();
            $table->string('adress')->nullable();
            $table->string('country')->nullable();
            $table->longText('about')->nullable();
            $table->string('lastname')->nullable();
            $table->string('postcode')->nullable();
            $table->string('rekening')->nullable();
            $table->string('firstname')->nullable();
            $table->string('shop_name')->nullable();
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
};
