<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_events', function (Blueprint $table) {
            $table->id();
            $table->text('heading')->nullable();
            $table->longText('desc')->nullable();
            $table->integer('deptid')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->text('img_url')->nullable();
            $table->text('pic_url')->nullable();
            $table->string('cat')->nullable();
            $table->date('display_date')->nullable();
            $table->date('last_date')->nullable();
            $table->text('link_url')->nullable();
            $table->text('icon_url')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('og_title')->nullable();
            $table->string('og_image')->nullable();
            $table->text('og_image_alt')->nullable();
            $table->text('og_description')->nullable();
            $table->integer('flag')->default(0);
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
        Schema::dropIfExists('news_events');
    }
}
