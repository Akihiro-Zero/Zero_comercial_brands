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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->integer('qty');
            $table->string('image');
            $table->string('color');
            $table->string('weight');
            $table->longText('price');
            $table->integer('cate_id');
            $table->integer('seller_id');
            $table->string('dimension');
            $table->longText('description');
            $table->string('status')->default('false');
            $table->string('popular')->default('false');
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
        Schema::dropIfExists('products');
    }
};
