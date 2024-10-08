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
        Schema::create('customer_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->string('userId');

            $table->string('remark');
            $table->foreignIdFor(till_transaction::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(agent_branch_teller::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(teller_till::class)->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_transactions');
    }
};
