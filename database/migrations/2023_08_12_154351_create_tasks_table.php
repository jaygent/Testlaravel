<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('project_id')->constrained();
            $table->enum('status',['backlog', 'wip', 'done', 'canceled'])->default('backlog');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('task');
    }
};
