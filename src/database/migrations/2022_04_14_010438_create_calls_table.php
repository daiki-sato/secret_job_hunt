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
            $table->date('confirmed_interview_date')->nullable();
            $table->date('call_start_time')->nullable();
            $table->date('call_end_time')->nullable();
            $table->boolean('is_ complete')->nullable();
            $table->boolean('evaluation')->nullable();

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