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

        Schema::create('till_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('customer_id')->nullable()->constrained('customers')->onDelete('set null');
            $table->foreignId('branch_id')->nullable()->constrained('company_branches')->onDelete('set null');
            $table->foreignId('till_id')->nullable()->constrained('tills')->onDelete('set null');
            $table->foreignId('bank_account_id')->nullable()->constrained('bank_accounts')->onDelete('set null');
            $table->enum('transaction_type', ['deposit', 'withdrawal', 'float_exchange', 'bank_deposit', 'bank_withdrawal', 'utility_payment']);
            $table->string('payment_reference')->nullable();
            $table->decimal('amount', 15, 2);
            $table->decimal('commission', 15, 2)->default(0);
            $table->string('service_provider')->nullable();
            $table->string('service_type')->nullable();
            $table->text('extra_description')->nullable();
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('till_transactions');
    }
};
