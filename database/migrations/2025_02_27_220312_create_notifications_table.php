<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id(); // INT (PK)
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // INT (FK)
            $table->text('message'); // TEXT
            $table->string('type', 50); // VARCHAR(50)
            $table->dateTime('sent_at'); // DATETIME
            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}