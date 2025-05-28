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
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('company_id')->nullable();
             $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
             $table->unsignedBigInteger('branch_id')->nullable();
             $table->foreign('branch_id')->references('id')->on('company_branches')->onDelete('cascade');
             $table->unsignedBigInteger('userid')->nullable();
             $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('teller_name')->nullable()->constrained('users')->onDelete('set null');
            $table->string('account_name');
            $table->string('bank_name');
            $table->string('account_number');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_accounts');
    }
};
