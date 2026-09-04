<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('contact_submissions', 'state')) {
            Schema::table('contact_submissions', function (Blueprint $table) {
                $table->string('state', 100)->nullable()->after('country')->index();
            });
        }

        if (! Schema::hasColumn('contact_submissions', 'city')) {
            Schema::table('contact_submissions', function (Blueprint $table) {
                $table->string('city', 100)->nullable()->after('state')->index();
            });
        }

        if (! Schema::hasColumn('contact_submissions', 'area')) {
            Schema::table('contact_submissions', function (Blueprint $table) {
                $table->string('area', 150)->nullable()->after('city')->index();
            });
        }
    }

    public function down(): void
    {
        Schema::table('contact_submissions', function (Blueprint $table) {
            $table->dropColumn(['state', 'city', 'area']);
        });
    }
};
