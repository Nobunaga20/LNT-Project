<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name', 40);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone_number', 15);
            $table->tinyInteger('role')->default(0); 
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('users');
    }
};
