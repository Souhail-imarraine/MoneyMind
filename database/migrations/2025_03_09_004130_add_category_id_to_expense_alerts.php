<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('expense_alerts', function (Blueprint $table) {
            $table->foreignId('category_id')->nullable()->constrained('categories');
            $table->string('alert_type')->default('total'); 
        });
    }

    public function down()
    {
        Schema::table('expense_alerts', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn(['category_id', 'alert_type']);
        });
    }
};
