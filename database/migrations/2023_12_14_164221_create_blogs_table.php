<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('header');
            $table->string('shortDesc')->nullable();
            $table->longText('body');
          // $table->boolean('isArabic')->default(false);
            $table->string('img')->nullable();

            $table->date('published_at');
            $table->foreignId('categories_id')
                ->constrained('blog_categories')
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
