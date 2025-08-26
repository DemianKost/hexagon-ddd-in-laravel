<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('workspace_members', function (Blueprint $table) {
            $table->foreignId('user_id')
                ->index()
                ->constrained('users')
                ->cascadeOnDelete();
            $table->foreignId('workspace_id')
                ->index()
                ->constrained('workspaces')
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('workspace_members');
    }
};
