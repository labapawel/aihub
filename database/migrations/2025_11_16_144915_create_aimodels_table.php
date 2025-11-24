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
        Schema::create('aimodels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('version')->nullable();
            $table->text('description')->nullable();
            $table->longText('script')->nullable();
            $table->integer('limitperday')->default(0);
            $table->integer('limitperminute')->default(0);
            $table->foreignId('group_id')->constrained('groups')->onDelete('cascade');
            $table->foreignId('scheduler_id')->constrained('schedules')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aimodels');
    }
};
