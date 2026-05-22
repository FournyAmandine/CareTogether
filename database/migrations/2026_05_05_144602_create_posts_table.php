<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('locality');
            $table->string('state');
            $table->integer('price');
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('img_path')->nullable();
            $table->string('marque')->nullable();
            $table->string('type');
            $table->tinyText('description');
            $table->boolean('sold')->default(0);
            $table->integer('views');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
