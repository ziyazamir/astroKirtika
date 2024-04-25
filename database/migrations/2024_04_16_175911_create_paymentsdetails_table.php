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
        Schema::create('paymentsdetails', function (Blueprint $table) {
            $table->id();
            $table->string('qr_image')->nullable();
            $table->integer('astrologer_id');
            $table->string('googlepay')->nullable();
            $table->string('paytm')->nullable();
            $table->string('phonepe')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paymentsdetails');
    }
};
