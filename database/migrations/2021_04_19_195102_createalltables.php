<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Createalltables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function(Blueprint $table) {
            $table->id();            
            $table->string('name');
            $table->string('real_name');
            $table->text('resume');
            $table->string('cover_url')->nullable();          
            $table->string('id_comics')->nullable();
            $table->string('id_movies')->nullable();
            $table->string('id_series')->nullable();
        });

        Schema::create('comics', function(Blueprint $table) {
            $table->id();            
            $table->string('title');
            $table->date('published_date');
            $table->string('writer');
            $table->string('penciler');
            $table->text('resume');
            $table->string('cover_url')->nullable();
        });

        Schema::create('movies', function(Blueprint $table) {
            $table->id();            
            $table->string('title');
            $table->date('release_date');
            $table->string('director');
            $table->text('resume');
            $table->string('cover_url')->nullable();
        });

        Schema::create('series', function(Blueprint $table) {
            $table->id();            
            $table->string('title');
            $table->date('release_date');
            $table->string('director');
            $table->text('resume');
            $table->string('cover_url')->nullable();
        });

        Schema::create('images', function(Blueprint $table) {
            $table->id();            
            $table->string('image_url');
            $table->string('id_characters')->nullable();
            $table->string('id_comics')->nullable();
            $table->string('id_movies')->nullable();
            $table->string('id_series')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('characters');
        Schema::dropIfExists('comics');
        Schema::dropIfExists('movies');
        Schema::dropIfExists('series');
        Schema::dropIfExists('images');
    }
}
