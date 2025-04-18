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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("email");
            $table->string("cell");
            $table->string("username");
            $table->string("edu");
            $table->string("photo") -> nullable();
            $table->integer("age");
            $table->string("gender");
            $table->json('course')->default(json_encode([]));
            $table->boolean("status")-> default(true);
            $table->boolean("trash")-> default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
