<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('user_id');
            $table->string('slug');
            $table->string('status');
            $table->string('moderation_status')->default('Pending');
            $table->string('title',255);
            $table->string('meta_description',2555);
            $table->string('description', 2555);
            $table->json('images');
            $table->string('category');
            $table->string('city',255);
            $table->string('state',255);
            $table->string('location',255);
            $table->string('latitude',255);
            $table->string('longitude',255);
            $table->string('flat_blocks');
            $table->string('flat_floors');
            $table->string('flat_number');
            $table->decimal('low_price', 12, 2);
            $table->decimal('max_price', 12, 2);
            $table->json('facilities');
            $table->json('features');
            $table->json('distance');
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
        Schema::dropIfExists('projects');
    }
}
