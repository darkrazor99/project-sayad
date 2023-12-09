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
        Schema::create('basic_articals', function (Blueprint $table) {
            $table->id();
            $table->string('header')->nullable();
            $table->string('shortDesc')->nullable();
            $table->longText('body')->nullable();
            $table->boolean('hasVid')->default(false);
            $table->boolean('hasPdf')->default(false);
            $table->boolean('isArabic')->default(false);
            $table->string('img')->nullable();
            $table->string('pdf')->nullable();
            $table->string('vid')->nullable();
            $table->date('published_at');
            $table->foreignId('category_id')
                ->constrained('categories')
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('basic_articals');
    }
};
