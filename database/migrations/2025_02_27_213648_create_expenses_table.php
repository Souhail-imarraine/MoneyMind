<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id(); // INT (PK)
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // INT (FK)
            $table->string('name'); // VARCHAR(255)
            $table->float('amount'); // FLOAT
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // INT (FK)
            $table->date('date'); // DATE
            $table->boolean('is_recurring')->default(false); // BOOLEAN
            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}