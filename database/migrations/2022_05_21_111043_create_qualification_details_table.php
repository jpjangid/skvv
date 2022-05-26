<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQualificationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {    
        Schema::create('qualification_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('onlineexam_id')->nullable();
            $table->string('qualifications')->nullable();
            $table->string('qualificationsname_of_board_university')->nullable();
            $table->string('passing_year')->nullable();
            $table->string('subject')->nullable();
            $table->string('marks')->nullable();
            $table->string('total_marks')->nullable();
            $table->string('percentage')->nullable();
            $table->string('grade')->nullable();
            $table->tinyInteger('flag')->default('0');
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
        Schema::dropIfExists('qualification_details');
    }
}
