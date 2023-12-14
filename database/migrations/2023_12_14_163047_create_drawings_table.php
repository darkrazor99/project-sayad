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
        Schema::create('drawings', function (Blueprint $table) {
            $table->id();
            $table->string('header');
            $table->string('shortDesc')->nullable();
            $table->longText('body')->nullable();
            // $table->boolean('hasVid')->default(false);
            // $table->boolean('hasPdf')->default(false);
            // remove me  or dont use me at all
            // $table->boolean('isArabic')->default(false);
            $table->string('img');

            // // remove these make own place
            // $table->string('pdf')->nullable();

            // // remove these make own place
            // $table->string('vid')->nullable();

            $table->date('published_at');
            $table->foreignId('category_id')
                ->constrained('drawing_categories')
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drawings');
    }
};
