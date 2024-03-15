<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArvanVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arvan_videos', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('title');
            $table->string('status')->nullable();
            $table->string('description')->nullable();
            $table->json('file_info')->nullable();
            $table->string('thumbnail_url')->nullable();
            $table->string('video_url')->nullable();
            $table->integer('thumbnail_time')->nullable();
            $table->json('mp4_videos')->nullable();
            $table->string('channel_id');
            $table->enum('convert_mode',['auto','manual','profile']);
            $table->string('profile_id')->nullable();
            $table->boolean('parallel_convert')->default(false);
            $table->string('watermark_id')->nullable();
            $table->string('watermark_area')->nullable();
            $table->json('convert_info')->nullable();
            $table->json('options')->nullable();
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
        Schema::dropIfExists('arvan_videos');
    }
}
