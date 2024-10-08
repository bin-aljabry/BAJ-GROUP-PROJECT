<?php

use App\Models\agent_branch_teller;
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
        Schema::create('branch_capitals', function (Blueprint $table) {
            $table->id();
            $table->string('amount');
            $table->string('category');
            $table->string('userId');
            $table->string('slug')->unique();
            $table->foreignIdFor(agent_branch_teller::class)->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branch_capitals');
    }
};
