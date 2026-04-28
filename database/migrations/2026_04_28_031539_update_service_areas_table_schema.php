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
        Schema::table('service_areas', function (Blueprint $table) {
            $table->dropColumn('point_ids');
            $table->json('coordinates')->after('name');
        });
    }

    public function down(): void
    {
        Schema::table('service_areas', function (Blueprint $table) {
            $table->dropColumn('coordinates');
            $table->json('point_ids');
        });
    }
};
