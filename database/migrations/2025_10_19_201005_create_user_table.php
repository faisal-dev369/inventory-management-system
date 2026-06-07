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
    Schema::create('user', function (Blueprint $table) {
        $table->bigIncrements('user_id');
        $table->string('user_name', 100);
        $table->string('user_photo', 255)->nullable();
        $table->string('user_email', 150)->unique();
        $table->string('username', 50)->unique();
        $table->string('user_pw', 255);
        $table->unsignedInteger('role_id')->default(1);
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
