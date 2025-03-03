<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // INT (FK)
            $table->string('name'); 
            $table->float('amount'); 
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // INT (FK)
            $table->date('date'); 
            $table->boolean('is_recurring')->default(false); 
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}