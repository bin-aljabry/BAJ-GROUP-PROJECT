<?php

use App\Models\agent_branch_teller;
use App\Models\teller_till;
use App\Models\till_transaction;
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
        Schema::create('debts', function (Blueprint $table) {

            
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('branch_id')->nullable()->constrained('company_branches')->onDelete('set null');
            $table->decimal('amount', 15, 2);
            $table->enum('type', ['loan', 'repayment']);
            $table->string('description')->nullable();
            $table->enum('status', ['unpaid', 'paid'])->default('unpaid');
            $table->date('due_date')->nullable();
            $table->date('paid_date')->nullable();
            $table->timestamps();
         
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('till_withdraw_transactions');
    }
};
