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
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->text('content');
            $table->string('slug');
            $table->string('image');
            $table->unsignedInteger('category_id')->nullable();
            $table->boolean('outstanding')->default(0)->comment('0- Không nổi bật, 1- Nổi bật');
            $table->boolean('status')->default(1)->comment('0- Chưa kích hoạt, 1- Hoạt động');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete(
                'set null'
            );
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
        Schema::dropIfExists('posts');
    }
};
