<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('account_role')->nullable();
            $table->string('avatar')->default('avatar.png');
            $table->string('about', 2555)->nullable();
            $table->string('phoneNumber')->nullable();
            $table->string('address', 2555)->nullable();
            $table->string('license')->nullable();
            $table->string('taxNumber')->nullable();
            $table->string('faxNumber')->nullable();
            $table->string('mobileNumber')->nullable();
            $table->string('language')->nullable();
            $table->string('companyName')->nullable();
            $table->string('skype')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->string('googlePlus')->nullable();
            $table->string('youtube')->nullable();
            $table->string('pinterest')->nullable();
            $table->string('vimeo')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
