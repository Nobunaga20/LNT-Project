<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoice_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('item_id'); 
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
            $table->integer('quantity');
            $table->integer('subtotal');
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('invoice_items');
    }
};
