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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId(column: 'user_id')->constrained()->onDelete(action: 'cascade');
            $table->string('title');    
            $table->text('description');
            $table->enum('status', ['todo', 'in-progress', 'done']);
            $table->enum('priority', ['high', 'medium', 'low']);
            $table->date('due_date')->nullable();
            $table->json('pre_requisite')->nullable();
            $table->boolean('archived')->default(false);
            $table->string('file_path')->nullable();
            $table->smallInteger('assigned_to')->nullable()->default(0)->index();
            $table->smallInteger('assigned_to_created_by')->nullable()->default(0)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
