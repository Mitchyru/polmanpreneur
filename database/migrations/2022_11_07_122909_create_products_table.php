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
            $table->bigIncrements('product_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('user')->onDelete('CASCADE');
            $table->string("image");
            $table->string('name');
            $table->string('price');
            $table->string("category");
            $table->string('desc');
            $table->boolean('setStock')->default(0); // stock still available / not available
            $table->boolean('setVisible')->default(0); // diplay / not
            $table->boolean('setStatus')->default(0); // accepted / denied
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
        Schema::dropIfExists('products');
    }
};
