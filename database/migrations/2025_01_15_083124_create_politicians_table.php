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
        Schema::create('politicians', function (Blueprint $table) {
            $table->id();
            $table->string('second_name');
            $table->string('first_name');
            $table->string('sex');
            $table->string('age');
            $table->foreignId('territory_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('politicians');
    }
};
