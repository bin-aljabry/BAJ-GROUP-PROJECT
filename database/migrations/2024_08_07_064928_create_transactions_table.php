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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('till_id')->nullable();
            $table->foreign('till_id')->references('id')->on('tills')->onDelete('cascade');
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id')->references('id')->on('company_branches')->onDelete('cascade');
            $table->unsignedBigInteger('userid')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('id')->on('customer_transactions')->onDelete('cascade');
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
        Schema::dropIfExists('transactions');
    }
};
