<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('savings_goals', function (Blueprint $table) {
            if (Schema::hasColumn('savings_goals', 'is_achieved')) {
                $table->dropColumn('is_achieved');
            }
        });

        Schema::table('savings_goals', function (Blueprint $table) {
            $table->boolean('is_achieved')->default(false);
        });
    }

    public function down()
    {
        Schema::table('savings_goals', function (Blueprint $table) {
            if (Schema::hasColumn('savings_goals', 'is_achieved')) {
                $table->dropColumn('is_achieved');
            }
        });
    }
};
