<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('status', ['DONE', 'TODO', 'DOING'])->default('DOING');
            $table->boolean('is_private')->default(false);
            $table->string('prerequisites')->nullable();
            $table->string('excerpt')->nullable();
            $table->string('intro_path')->nullable();
            $table->text('body')->nullable();
            $table->unsignedInteger('duration')->default(0); // minute
            $table->unsignedInteger('count_downloaded')->default(0); // minute
            $table->unsignedInteger('price')->nullable();
            $table->unsignedInteger('supported_price')->nullable();
            $table->string('thumbnail_path')->nullable();
            $table->foreignId('author_id');
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
        Schema::dropIfExists('courses');
    }
}
