<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnlineExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_exams', function (Blueprint $table) {
            $table->id();
            $table->string('addmission')->nullable();
            $table->string('subject')->nullable();
            $table->string('addmission_year')->nullable();
            $table->string('student_name')->nullable();
            $table->BigInteger('adhaar_no')->nullable();
            $table->string('stud_father_name')->nullable();
            $table->string('stud_mother_name')->nullable();
            $table->string('email')->nullable();
            $table->date('dob')->nullable();
            $table->string('nationalilty')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('address')->nullable();
            $table->string('caste')->nullable();
            $table->string('cast_certificate')->nullable();
            $table->string('disability_certificate')->nullable();
            $table->string('annual_imacome')->nullable();
            $table->string('payment')->nullable();
            $table->string('payment_status')->nullable();
            $table->date('date')->nullable();
            $table->string('signature')->nullable();
            $table->string('stud_image')->nullable();

            //office releted
            $table->string('recipt_no')->nullable();
            $table->string('mismatch_form_1')->nullable();
            $table->string('mismatch_form_2')->nullable();
            $table->string('mismatch_form_3')->nullable();
            $table->string('mismatch_form_4')->nullable();

            $table->string('checking_signature_1')->nullable();
            $table->string('checking_signature_2')->nullable();
            $table->string('checking_signature_3')->nullable();
            $table->string('status')->nullable();

            $table->unsignedBigInteger('location_id')->nullable();
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
        Schema::dropIfExists('online_exams');
    }
}
