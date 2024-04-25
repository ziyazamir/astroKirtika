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
        //         o	Name --
        // o	Designation --
        // o	Email --
        // o	Phone --
        // o	Phone 2(optional) --
        // o	Country --
        // o	Phone code --
        // o	Intro video (optional) --
        // o	Languages (multiple) --
        // o	Total experience --
        // o	Fees --
        // o	Vast visit --
        // o	Whatapp number --
        // o	Profile image --

        Schema::create('astrologers', function (Blueprint $table) {
            $table->id();
            // $table->string('name');
            // $table->string('email')->unique();
            $table->string('phone2')->nullable();
            $table->foreignId('user_id');
            $table->string('profile_image')->nullable();
            $table->string('intro_video')->nullable();
            $table->string('designation')->nullable();
            $table->string('languages')->nullable();
            $table->string('total_experience')->nullable();
            $table->string('fees')->nullable();
            $table->string('visit')->nullable();
            $table->string('w_number')->nullable();
            $table->integer('membership_id');
            $table->string('country');
            $table->string('phone_code');
            // $table->string('password');
            // $table->enum('membership', ['silver', 'gold', 'platinum']);
            $table->enum('status', ['active', 'inactive'])->default('inactive');
            $table->integer('featured')->default(0);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('astrologers');
    }
};
