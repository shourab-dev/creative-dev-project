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
        Schema::create('banner_parts', function (Blueprint $table) {
            $table->id();
            $table->string('slogan')->default('দেশ সেরা আইটি ট্রেনিং ইনস্টিটিউটে');
            $table->string('heading')->default('ক্যারিয়ার শুরু হোক');
            $table->string('secondary_heading')->default('দক্ষতার আত্মবিশ্বাসে');
            $table->string('detail')->default('অভিজ্ঞ মেন্টর আর আপডেটেড কারিকুলাম নিয়ে ক্রিয়েটিভ আইটি ইনস্টিটিউট প্রস্তুত আপনার ক্যারিয়ার গড়ার অগ্রযাত্রায়। আমাদের ৩০টিরও বেশি ট্রেন্ডি কোর্স থেকে আজই বেছে নিন আপনার পছন্দের কোর্স।');
            $table->string('iframe')->nullable();
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
        Schema::dropIfExists('banner_parts');
    }
};
