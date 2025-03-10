<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('savings_goals', function (Blueprint $table) {
            // D'abord supprimer la colonne existante
            $table->dropColumn('is_achieved');
        });

        Schema::table('savings_goals', function (Blueprint $table) {
            // Ensuite recréer la colonne avec le bon type
            $table->boolean('is_achieved')->default(false);
        });
    }

    public function down()
    {
        Schema::table('savings_goals', function (Blueprint $table) {
            $table->dropColumn('is_achieved');
            $table->tinyInteger('is_achieved')->default(0);
        });
    }
};
