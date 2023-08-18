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
        Schema::create('people_data', function (Blueprint $table) {

            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->string('document')->unique();
            $table->string('document_city')->nullable();
            $table->string('document_type_id')->default(0);
            $table->string('regime_id')->nullable();
            $table->string('city')->nullable();
            $table->string('legal_representation_id')->nullable();
            $table->string('organitation_path')->nullable();
            $table->string('comments')->nullable();
            $table->date('born_date')->nullable();
            $table->tinyInteger('age')->default(0);
            $table->boolean('active')->default(true);
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('people_data');
    }
};
