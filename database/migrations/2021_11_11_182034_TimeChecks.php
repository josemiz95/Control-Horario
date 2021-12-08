<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TimeChecks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_slots', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->date('date');
            $table->time('total_time')->default("00:00:00");
            $table->integer('total_seconds')->default(0);

            $table->boolean('created')->default(0);
            
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('time_checks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('slot_id');
            $table->string('type'); // In / Out
            $table->dateTime('check_time');
            $table->text('comment')->nullable();
            $table->boolean('changed')->default(0);
            $table->unsignedBigInteger('changed_by')->nullable();

            $table->timestamps();

            $table->foreign('slot_id')->references('id')->on('time_slots')->onDelete('cascade');
            $table->foreign('changed_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
