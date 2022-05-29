<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_customizes', function (Blueprint $table) {
            $table->id();
            $table->string('banner_stle')->default('ctg');
            $table->boolean('facebook_review')->default(false);
            $table->string('seminar_stle')->default('ctg');
            $table->string('course_stle')->default('ctg');
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
        Schema::dropIfExists('home_customizes');
    }
};
