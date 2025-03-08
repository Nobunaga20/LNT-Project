<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('name', 80);
            $table->integer('price');
            $table->integer('quantity');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('items');
    }
};
