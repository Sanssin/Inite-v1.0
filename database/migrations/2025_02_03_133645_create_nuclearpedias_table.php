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
        Schema::create('nuclearpedia', function (Blueprint $table) {
            $table->id();
            // ...existing code...
            $table->string('title');
            $table->string('file_path');
            $table->timestamps();
            // ...existing code...
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('nuclearpedia');
    }
};
