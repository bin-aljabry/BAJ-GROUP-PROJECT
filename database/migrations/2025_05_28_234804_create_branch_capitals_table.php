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
        Schema::create('branch_capitals', function (Blueprint $table) {
            $table->id();
    
     $table->foreignId('company_id')->constrained('companies'); // Admin
    $table->foreignId('branch_id')->nullable()->constrained('company_branches'); // Manager
   
    $table->decimal('amount', 15, 2);
    $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // Manager approval
    $table->timestamp('approved_at')->nullable();
    $table->foreignId('created_by')->constrained('users'); // Admin
    $table->foreignId('approved_by')->nullable()->constrained('users'); // Manager
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
