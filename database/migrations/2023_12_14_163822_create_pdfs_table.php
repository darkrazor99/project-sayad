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
        Schema::create('pdfs', function (Blueprint $table) {
            $table->id();
            $table->string('header');
            $table->string('shortDesc')->nullable();
            $table->longText('body')->nullable();
            $table->string('img')->nullable();

            $table->string('pdf');

            // // remove these make own place
            // $table->string('vid')->nullable();

            $table->date('published_at');
            $table->foreignId('category_id')
                ->constrained('pdf_categories')
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pdfs');
    }
};
