<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStrippedTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stripped_tracks', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->integer('external_track_id');
            $table->char('artist1', 255);
            $table->char('artist2', 255)->nullable();
            $table->char('artist3', 255)->nullable();
            $table->char('artist4', 255)->nullable();
            $table->char('artist5', 255)->nullable();
            $table->char('artist6', 255)->nullable();
            $table->char('artist7', 255)->nullable();
            $table->char('artist8', 255)->nullable();
            $table->char('track_name', 255);
            $table->char('instruments', 255);
            $table->smallInteger('duration');
            $table->char('isrc_code', 255);
            $table->char('track_name', 255);
            $table->char('album_name', 255);
            $table->char('album_code', 255);
            $table->char('instruments', 255);
            $table->smallInteger('album_release_year');
            $table->char('label_name', 255);
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
        Schema::dropIfExists('stripped_tracks');
    }
}
