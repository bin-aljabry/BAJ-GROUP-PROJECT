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
        Schema::create('teller_tills', function (Blueprint $table) {
            $table->id();
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('till_id')->constrained('tills')->onDelete('cascade');
            $table->timestamps();
            $table->string('slug')->unique();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('till_deposit_transactions');
    }
};
