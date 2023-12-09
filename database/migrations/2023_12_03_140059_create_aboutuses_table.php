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
        Schema::create('aboutuses', function (Blueprint $table) {
            $table->id();
            $table->string('h1');
            $table->string('h1-ar');
            $table->string('p');
            $table->string('p-ar');
            $table->string('sh1');
            $table->string('sh1-ar');
            $table->string('sh2');
            $table->string('sh2-ar');
            $table->string('sh3');
            $table->string('sh3-ar');
            $table->string('sh4');
            $table->string('sh4-ar');
            $table->string('phone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aboutuses');
    }
};
