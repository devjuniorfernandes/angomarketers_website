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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->longText('body'); // Storytelling review/summary or future detailed description
            $table->string('image_path')->nullable(); // Banner image
            $table->dateTime('event_date');
            $table->string('location');
            $table->string('registration_link')->nullable(); // Registration form or external link
            $table->string('video_url')->nullable(); // Youtube video link for past events
            $table->string('status')->default('published'); // draft, published, scheduled
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });

        Schema::create('event_photos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('events')->onDelete('cascade');
            $table->string('image_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_photos');
        Schema::dropIfExists('events');
    }
};
