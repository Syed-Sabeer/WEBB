<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        foreach (['visitors', 'contact_submissions'] as $tableName) {
            if (! Schema::hasColumn($tableName, 'postal_code')) {
                Schema::table($tableName, function (Blueprint $table) {
                    $table->string('postal_code', 30)->nullable()->after('city')->index();
                });
            }

            DB::table($tableName)
                ->where('area', 'like', 'Postal code %')
                ->update([
                    'postal_code' => DB::raw("SUBSTRING(area, 13)"),
                    'area' => 'Unknown',
                ]);
        }
    }

    public function down(): void
    {
        foreach (['visitors', 'contact_submissions'] as $tableName) {
            if (Schema::hasColumn($tableName, 'postal_code')) {
                Schema::table($tableName, function (Blueprint $table) {
                    $table->dropColumn('postal_code');
                });
            }
        }
    }
};
