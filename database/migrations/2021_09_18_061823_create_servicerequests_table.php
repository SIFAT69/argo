<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicerequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicerequests', function (Blueprint $table) {
            $table->id();
            $table->string('service_title')->nullable();
            $table->string('type')->nullable();
            $table->string('code_id')->nullable();
            $table->string('title')->nullable();
            $table->string('user_id')->nullable();
            $table->string('agent_id')->nullable();
            $table->string('requester')->nullable();
            $table->string('priority')->nullable();
            $table->string('status')->nullable();
            $table->string('request_desc')->nullable();
            $table->string('notes')->nullable();
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
        Schema::dropIfExists('servicerequests');
    }
}
