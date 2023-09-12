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
        Schema::create('documents', function (Blueprint $table) {

            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('content')->nullable();
            $table->string('document_url')->nullable();
            $table->unsignedBigInteger('documentable_id');
            $table->string('documentable_type');
            $table->string('versionNumber');
            $table->unsignedBigInteger('user_id');
            $table->boolean('active')->default(True);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('Users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
