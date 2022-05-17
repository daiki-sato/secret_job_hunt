<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterviewTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interview_times', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('interview_id');
            $table->boolean('is_agreement')->nullable();
            $table->dateTime('from_what_time');
            $table->dateTime('to_what_time');

            $table->timestamps();
            $table->softDeletes();

            // $table->foreign('interview_id')->references('id')->on('interviews');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interview_times');
    }
}