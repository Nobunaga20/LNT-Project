<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up() {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            $table->string('invoice_number')->unique();
            $table->integer('total_price');
            $table->string('shipping_address');
            $table->string('postal_code');
            $table->timestamps();
        });
        
    }
    public function down() {
        Schema::dropIfExists('invoices');
    }
};
