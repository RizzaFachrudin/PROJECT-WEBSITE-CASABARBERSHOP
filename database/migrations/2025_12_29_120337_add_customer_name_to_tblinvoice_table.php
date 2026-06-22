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
        Schema::table('tblinvoice', function (Blueprint $table) {
             $table->string('CustomerName', 100)->after('ServiceId')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tblinvoice', function (Blueprint $table) {
             $table->dropColumn('CustomerName');
        });
    }
};
