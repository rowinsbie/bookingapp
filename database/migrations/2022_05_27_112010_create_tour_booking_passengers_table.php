<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_booking_passengers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('booking_id');
            $table->unsignedBigInteger('passenger_id');
            $table->foreign('booking_id')->references('id')->on('tour_bookings');
            $table->foreign('passenger_id')->references('id')->on('passengers');

            // $table->foreignId('booking_id')->constrained('tour_bookings').onDelete('cascade');
            // $table->foreignId('passenger_id')->constrained('passengers').onDelete('cascade');
            $table->text('special_request',255)->nullable();
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
        Schema::dropIfExists('tour_booking_passengers');
    }
};
