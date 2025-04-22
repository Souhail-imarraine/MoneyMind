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
        Schema::table('savings_goals', function (Blueprint $table) {
            if (!Schema::hasColumn('savings_goals', 'is_achieved')) {
                $table->boolean('is_achieved')->default(false);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('savings_goals', function (Blueprint $table) {
            if (Schema::hasColumn('savings_goals', 'is_achieved')) {
                $table->dropColumn('is_achieved');
            }
        });
    }
};
