<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
          $table->id();
          $table->string('user_id');
          $table->string('slug');
          $table->string('status');
          $table->string('moderation_status')->default('Pending');
          $table->string('title',255);
          $table->string('meta_description',255);
          $table->string('description');
          $table->json('images');
          $table->string('category');
          $table->string('city',255);
          $table->string('location',255);
          $table->string('latitude',255);
          $table->string('longitude',255);
          $table->string('flat_beds');
          $table->string('flat_baths');
          $table->string('flat_floors');
          $table->string('size');
          $table->string('price');
          $table->json('facilities')->nullable();
          $table->json('features')->nullable();
          $table->json('distance')->nullable();
          $table->string('youtube_thumb');
          $table->string('youtube_link');
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
        Schema::dropIfExists('properties');
    }
}