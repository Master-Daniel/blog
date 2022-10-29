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
        Schema::create('push_subscribers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('endpoint');
            $table->string('expirationTime')->default('0');
            $table->string('p256dh');
            $table->string('authKey');
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
        Schema::dropIfExists('push_subscribers');
    }
};
