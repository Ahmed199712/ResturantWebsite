<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('website_name')->nullable();
            $table->string('website_logo')->nullable();
            $table->string('website_email');
            $table->string('website_phone');
            $table->string('website_address');
            $table->string('website_desc');
            $table->integer('stop_comments')->default(0);
            $table->integer('stop_register')->default(0);
            $table->integer('stop_website')->default(0);
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
        Schema::dropIfExists('settings');
    }
}
