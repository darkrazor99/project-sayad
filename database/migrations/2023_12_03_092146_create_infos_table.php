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
        Schema::create('infos', function (Blueprint $table) {
            $table->id();
            $table->string('img');
            $table->string('mainh1')->nullable();
            $table->string('mainh2')->nullable();
            $table->string('subh1')->nullable();
            $table->string('p1')->nullable();
            $table->string('subh2')->nullable();
            $table->string('p2')->nullable();
            $table->string('subh3')->nullable();
            $table->string('p3')->nullable();
            $table->string('subh4')->nullable();
            $table->string('p4')->nullable();
            $table->string('mainh1-ar')->nullable();
            $table->string('mainh2-ar')->nullable();
            $table->string('subh1-ar')->nullable();
            $table->string('p1-ar')->nullable();
            $table->string('subh2-ar')->nullable();
            $table->string('p2-ar')->nullable();
            $table->string('subh3-ar')->nullable();
            $table->string('p3-ar')->nullable();
            $table->string('subh4-ar')->nullable();
            $table->string('p4-ar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infos');
    }
};
