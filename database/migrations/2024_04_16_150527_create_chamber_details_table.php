<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * o	City
     *o	address
     *o	Week days (Sunday, monday)
     *o	Start time
     *o	End time

     */
    public function up(): void
    {
        Schema::create('chamber_details', function (Blueprint $table) {
            $table->id();
            $table->integer('chamber_id');
            $table->integer('astrologer_id');
            $table->string('other_chamber')->nullable();
            $table->string('location')->nullable();
            $table->string('city');
            $table->string('address');
            $table->string('weekdays');
            $table->string('start_time');
            $table->string('end_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chamber_details');
    }
};
