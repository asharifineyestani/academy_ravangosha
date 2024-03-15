<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArvanChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arvan_channels', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('title');
            $table->text('description')->nullable();
            $table->boolean('secure_link_enabled')->default(false);
            $table->boolean('secure_link_with_ip')->default(false);
            $table->string('secure_link_key')->nullable();
            $table->boolean('ads_enabled')->default(false);
            $table->string('present_type')->nullable();
            $table->string('campaign_id')->nullable();
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
        Schema::dropIfExists('arvan_channels');
    }
}
