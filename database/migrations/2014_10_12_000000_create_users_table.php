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
            $table->string('created_by')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('balance')->default(0);
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
            $table->string('bank_name')->nullable();
            $table->string('bank_account')->nullable();
            $table->string('bank_sort_code')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('dob')->nullable();
            $table->string('identification_documents')->nullable();
            $table->string('contractual_documents')->nullable();
            $table->string('account_id')->nullable();
            $table->string('is_active_account')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
