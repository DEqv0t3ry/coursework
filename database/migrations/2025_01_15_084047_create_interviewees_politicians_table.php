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
        Schema::create('interviewees_politicians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('interviewee_id')->constrained()->onDelete('cascade');
            $table->foreignId('politician_id')->constrained()->onDelete('cascade');
            $table->integer('priority');
            $table->date('date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interviewees_politicians');
    }
};
