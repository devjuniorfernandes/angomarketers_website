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
        Schema::table('articles', function (Blueprint $table) {
            $table->boolean('featured')->default(false)->after('status');
            $table->unsignedInteger('views_count')->default(0)->after('featured');
            $table->string('meta_title')->nullable()->after('views_count');
            $table->text('meta_description')->nullable()->after('meta_title');
            $table->string('og_image')->nullable()->after('meta_description');
        });

        Schema::table('events', function (Blueprint $table) {
            $table->boolean('featured')->default(false)->after('status');
            $table->unsignedInteger('views_count')->default(0)->after('featured');
            $table->string('organizer')->nullable()->after('views_count');
            $table->dateTime('event_end_date')->nullable()->after('event_date');
            $table->decimal('ticket_price', 10, 2)->nullable()->after('event_end_date');
            $table->unsignedInteger('capacity')->nullable()->after('ticket_price');
            $table->string('meta_title')->nullable()->after('capacity');
            $table->text('meta_description')->nullable()->after('meta_title');
            $table->string('og_image')->nullable()->after('meta_description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn(['featured', 'views_count', 'meta_title', 'meta_description', 'og_image']);
        });

        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn(['featured', 'views_count', 'organizer', 'event_end_date', 'ticket_price', 'capacity', 'meta_title', 'meta_description', 'og_image']);
        });
    }
};
