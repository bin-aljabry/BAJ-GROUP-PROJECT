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
        Schema::create('teller_cashes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('branch_id')->nullable()->constrained('company_branches')->onDelete('set null');
            $table->decimal('opening_balance', 15, 2)->default(0);
            $table->decimal('total_income', 15, 2)->default(0);
            $table->decimal('total_expense', 15, 2)->default(0);
            $table->decimal('cash_out', 15, 2)->default(0);
            $table->decimal('closing_balance', 15, 2)->default(0);
            $table->decimal('debt_total', 15, 2)->default(0);
            $table->decimal('actual_balance', 15, 2)->default(0);
            $table->date('date');
            $table->timestamps();
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teller_cashes');
    }
};
