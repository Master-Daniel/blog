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
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('post_slug');
            $table->string('post_title');
            $table->string('post_summary');
            $table->string('post_category');
            $table->string('post_sub_category')->nullable();
            $table->string('post_section')->nullable();
            $table->string('post_image');
            $table->text('post_body');
            $table->text('post_tags');
            $table->enum('post_status', ['0', '1'])->default('1')->comment('0=unpublished, 1=published');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
