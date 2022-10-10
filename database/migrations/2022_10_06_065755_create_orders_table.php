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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('seller_id');
            $table->string('firstname')->nullable();
            $table->integer('user_id');
            $table->integer('prod_id');
            $table->string('messsage')->nullable();
            $table->string('lastname')->nullable();
            $table->string('address')->nullable();
            $table->string('country')->nullable();
            $table->integer('price');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('city')->nullable();
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
};
