<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSavingsGoalsTable extends Migration
{
    public function up()
    {
        Schema::create('savings_goals', function (Blueprint $table) {
            $table->id(); // INT (PK)
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // INT (FK)
            $table->float('goal_amount'); // FLOAT
            $table->float('current_amount')->default(0); // FLOAT
            $table->date('target_date'); // DATE
            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('savings_goals');
    }
}