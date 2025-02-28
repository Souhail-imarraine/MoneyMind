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
        Schema::create('budget_alerts', function (Blueprint $table) {
            $table->id(); // INT (PK)
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // INT (FK)
            $table->float('global_threshold'); // FLOAT
            $table->json('category_threshold'); // JSON
            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budget_alerts');
    }
};
