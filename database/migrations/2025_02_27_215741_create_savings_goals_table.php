<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSavingsGoalsTable extends Migration
{
    public function up()
    {
        Schema::create('savings_goals', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->float('goal_amount'); 
            $table->float('current_amount')->default(0); 
            $table->date('target_date'); 
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('savings_goals');
    }
}