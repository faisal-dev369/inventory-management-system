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
        Schema::create('expense_categories', function (Blueprint $table) {
            $table->bigIncrements('expcate_id'); // ID - primary key, auto-increment
            $table->string('expcate_name', 50)->unique(); // Category নাম, unique
            $table->string('expcate_remarks', 200)->nullable(); // Remarks optional
            $table->string('expcate_creator')->nullable(); // কে তৈরি করেছে
            $table->string('expcate_editor')->nullable(); // কে edit করেছে
            $table->string('expcate_slug', 30)->nullable(); // Slug, optional
            $table->integer('expcate_status')->default(1); // status, default 1
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expense_categories');
    }
};
