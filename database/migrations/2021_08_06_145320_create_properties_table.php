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
          $table->string('code');
          $table->string('assigned_to')->nullable();
          $table->string('user_id');
          $table->string('slug');
          $table->string('type');
          $table->string('status');
          $table->string('moderation_status')->default('Approved');
          $table->string('title',255);
          $table->string('meta_description',2555);
          $table->string('description',2555);
          $table->json('images');
          $table->string('category');
          $table->string('city',255);
          $table->string('location',255);
          $table->string('states',255);
          $table->string('address',255)->nullable();
          $table->string('latitude',255);
          $table->string('longitude',255);
          $table->string('flat_beds');
          $table->string('flat_baths');
          $table->string('flat_floors');
          $table->string('size');
          $table->decimal('price', 12, 2);
          $table->json('facilities')->nullable();
          $table->json('features')->nullable();
          $table->json('distance')->nullable();
          $table->string('landloard')->nullable();
          $table->string('youtube_thumb');
          $table->string('youtube_link');
          $table->string('is_featured')->default('No');
          $table->string('rent_status')->nullable();
          $table->string('remaining_days')->nullable();
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
