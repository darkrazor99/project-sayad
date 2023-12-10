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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('small')->nullable();
            $table->string('mainh1');
            $table->string('s1')->nullable();
            $table->string('p1')->nullable();
            $table->string('s2')->nullable();
            $table->string('p2')->nullable();
            $table->string('s3')->nullable();
            $table->string('p3')->nullable();
            $table->string('s4')->nullable();
            $table->string('p4')->nullable();
            $table->string('s5')->nullable();
            $table->string('p5')->nullable();
            $table->string('mainphone')->nullable();
            $table->string('p6')->nullable();
            $table->string('small_ar')->nullable();
            $table->string('mainh1_ar')->nullable();
            $table->string('s1_ar')->nullable();
            $table->string('p1_ar')->nullable();
            $table->string('s2_ar')->nullable();
            $table->string('p2_ar')->nullable();
            $table->string('s3_ar')->nullable();
            $table->string('p3_ar')->nullable();
            $table->string('s4_ar')->nullable();
            $table->string('p4_ar')->nullable();
            $table->string('s5_ar')->nullable();
            $table->string('p5_ar')->nullable();
            $table->string('mainphone_ar')->nullable();
            $table->string('p6_ar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
