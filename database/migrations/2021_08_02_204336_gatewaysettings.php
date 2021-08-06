<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Gatewaysettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('gatewaysettings', function (Blueprint $table) {
          $table->increments('id');
          $table->string('public_key')->default('pk_test_51Ic31vAvjSDpdiu4vOxF5gxK9aporITPSDwopdAdtRcOD05U12cRDDUzrGBE68VxenB20YCmMWH1EMkMpdolsLXn00RH2s1mwB');
          $table->string('private_key')->default('sk_test_51Ic31vAvjSDpdiu41rDwfhxI6EGPESq6fageb4qYq180X7c8HqtjBp7L6s9WdI8igbxIPfY1ZeQCW60TGygSythc00GitPxO12');
          $table->string('status')->default('1');
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
        //
    }
}
