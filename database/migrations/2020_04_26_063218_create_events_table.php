<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('event_name');
            $table->date('event_startDate');
            $table->date('event_endDate')->nullable();
            $table->time('event_startTime');
            $table->time('event_endTime')->nullable();
            $table->string('event_description')->nullable();
            $table->integer('event_priority')->nullable();
            $table->integer('event_notification')->nullable();
            $table->string('event_notify')->nullable();
            $table->string('event_recursion')->nullable();
            $table->json('event_repeating_days')->nullable();
            $table->json('event_data')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
