<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('astrologer_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('description');
            $table->string('type');
            // $table->foreign('astrologer_id')->references('id')->on('astrologers')->onDelete('cascade');
            $table->timestamps();

            // Define foreign key constraints
            // $table->foreign('notification_id')->references('id')->on('notifications')->onDelete('cascade');
            // $table->foreign('astrologer_id')->references('id')->on('astrologers')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
