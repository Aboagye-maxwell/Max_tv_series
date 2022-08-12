<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->id();
            $table->string('series_name')->unique();
            $table->mediumText('series_description');
            $table->mediumText('series_description_truancated')->nullable();
            $table->mediumText('users_loved')->nullable();
            $table->string('genres')->nullable();
            $table->string('language')->nullable();
            $table->string('resolution')->nullable();
            $table->string('estimated_episode_size')->nullable();
            $table->string('imdb_rating')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('cover_image_sized')->nullable();
            $table->string('recent')->nullable();
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
        Schema::dropIfExists('series');
    }
}
