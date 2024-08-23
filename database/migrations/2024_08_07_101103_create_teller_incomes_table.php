<?php

use App\Models\agent_branch;
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
        Schema::create('teller_incomes', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('amount');
            $table->string('date');
            $table->string('category');
            $table->string('userId');
            $table->foreignIdFor(agent_branch_teller::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(agent_branch::class)->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teller_incomes');
    }
};
