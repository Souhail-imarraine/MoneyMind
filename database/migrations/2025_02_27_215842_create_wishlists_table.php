<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWishlistsTable extends Migration
{
    public function up()
    {
        Schema::create('wishlists', function (Blueprint $table) {
            $table->id(); // INT (PK)
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // INT (FK)
            $table->string('name'); // VARCHAR(255)
            $table->float('target_amount'); // FLOAT
            $table->float('current_amount')->default(0); // FLOAT
            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('wishlists');
    }
}