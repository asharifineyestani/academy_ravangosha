<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeFieldsToArvanVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('arvan_videos', function (Blueprint $table) {
            //
            $table->foreignId('topic_id')->nullable()->constrained();
            $table->boolean('is_free')->default(false);
            $table->integer('sort_number')->nullable();
            $table->string('thumbnail_path')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('arvan_videos', function (Blueprint $table) {
            //
            $table->dropColumn('topic_id');
            $table->dropColumn('is_free');
        });
    }
}
