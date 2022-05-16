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
            $table->string('password');
            $table->string('designation')->nullable();
            $table->string('mobile')->nullable();
            $table->string('line1')->nullable();
            $table->string('line2')->nullable();
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->unsignedBigInteger('location_id')->nullable();
            $table->foreign('role_id')
            ->references('id')
            ->on('roles')
            ->onDelete('cascade');
            $table->text('image')->nullable();
            $table->string('role');
            $table->timestamp('email_verified_at')->nullable();
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
