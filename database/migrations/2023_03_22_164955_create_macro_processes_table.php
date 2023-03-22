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
        Schema::create('macro_processes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('macroprocess_id')->nullable();
            $table->string('nombre');
            $table->string('description')->nullable();
            $table->foreign('macroprocess_id')->references('id')->on('macro_processes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('macro_processes');
    }
};
