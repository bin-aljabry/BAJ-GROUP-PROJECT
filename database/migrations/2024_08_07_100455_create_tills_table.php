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
        Schema::create('tills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->foreignId('branch_id')->constrained('company_branches')->onDelete('set null');
            
            $table->string('network_provider');
            $table->string('till_code', 100);
            $table->enum('till_type', ['standard', 'payment_line'])->default('standard');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();

            $table->string('slug')->unique();
            $table->string('code_no')->unique();
            $table->string('type');


            $table->foreignIdFor(agent_branch_teller::class)->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teller_tills');
    }
};
