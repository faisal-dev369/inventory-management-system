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
        Schema::create('income_categories', function (Blueprint $table) {
    $table->bigIncrements('incate_id'); // ID - primary key, auto-increment, প্রতিটি row এর আলাদা পরিচয়
    $table->string('incate_name',50)->unique(); // Category নাম, max 50 character, duplicate নাম allowed নয়
    $table->string('incate_remarks',200)->nullable(); // Remarks/মন্তব্য, 200 character পর্যন্ত, খালি রাখা যাবে
    $table->string('incate_creator')->nullable(); // Category কে তৈরি করেছে, optional
    $table->string('incate_editor')->nullable(); 
    $table->string('incate_slug',30)->nullable(); // Slug / URL-friendly নাম, 30 character, optional
    $table->integer('incate_status')->default(1); // Status, integer, default 1 (active)
    $table->timestamps(); // created_at & updated_at, auto timestamp
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('income_categories');
    }
};
