<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('blogs') && !Schema::hasColumn('blogs', 'category')) {
            Schema::table('blogs', function (Blueprint $table) {
                $table->string('category')->nullable()->after('content')->index();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('blogs') && Schema::hasColumn('blogs', 'category')) {
            Schema::table('blogs', function (Blueprint $table) {
                $table->dropColumn('category');
            });
        }
    }
};
