<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->string('name')->nullable();
            $table->string('type_of_year')->nullable();
            $table->string('number_of_year')->nullable();
            $table->string('pdf')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->text('eligibility')->nullable();
            $table->string('seats')->nullable();
            $table->string('course_type')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('og_title')->nullable();
            $table->string('og_image')->nullable();
            $table->text('og_image_alt')->nullable();
            $table->text('og_description')->nullable();
            $table->integer('top_course')->default(0);
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('courses');
    }
}
