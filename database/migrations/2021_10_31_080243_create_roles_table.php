<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('rolesname');
            $table->string('dashboard')->default('off');
            $table->string('message')->default('off');
            $table->string('contacts')->default('off');
            $table->string('properties')->default('off');
            $table->string('projects')->default('off');
            $table->string('features')->default('off');
            $table->string('facilities')->default('off');
            $table->string('categories')->default('off');
            $table->string('landlord')->default('off');
            $table->string('tenant_list')->default('off');
            $table->string('service_request')->default('off');
            $table->string('contracts')->default('off');
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
        Schema::dropIfExists('roles');
    }
}
