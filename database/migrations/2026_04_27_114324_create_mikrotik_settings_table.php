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
        Schema::create('mikrotik_settings', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->string('host');
            $table->integer('port')->default(8728);
            $table->string('username');
            $table->string('password');
            $table->string('default_profile');
            $table->string('isolir_profile');
            $table->string('default_service');
            $table->boolean('is_active')->default(true);
            $table->timestamp('last_connected_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mikrotik_settings');
    }
};
