<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('thread_id');
            $table->string('call_room_id');
            $table->integer('user_id');
            $table->integer('solver_id');
            $table->dateTime('confirmed_interview_date')->nullable();
            $table->dateTime('call_start_time')->nullable();
            $table->dateTime('call_end_time')->nullable();
            $table->boolean('is_complete')->nullable();
            $table->boolean('evaluation')->nullable();
            $table->string('evaluation_comment')->nullable();

            $table->timestamps();
            $table->softDeletes();

            // $table->foreign('thread_id')->references('id')->on('threads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calls');
    }
}