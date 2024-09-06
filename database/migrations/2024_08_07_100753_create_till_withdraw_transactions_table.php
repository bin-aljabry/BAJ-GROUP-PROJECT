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
        Schema::create('till_withdraw_transactions', function (Blueprint $table) {
            $table->id();


            $table->string('teller_name');
            $table->string('customer_name');
            $table->string('phone');
            $table->string('slug')->unique();
            $table->string('amount');
            $table->string('transaction_id');
            $table->string('till_number');
            $table->string('till_type');
            $table->string('userId');

            $table->foreignIdFor(agent_branch_teller::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(teller_till::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(till_transaction::class)->constrained()->onDelete('cascade');

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
