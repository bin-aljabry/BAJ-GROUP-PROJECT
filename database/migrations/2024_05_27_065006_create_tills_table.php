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
        Schema::create('tills', function (Blueprint $table) {
             $table->id();
             $table->unsignedBigInteger('company_id')->nullable();
             $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
             $table->unsignedBigInteger('branch_id')->nullable();
             $table->foreign('branch_id')->references('id')->on('company_branches')->onDelete('cascade');
             $table->unsignedBigInteger('userid')->nullable();
             $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('teller_name')->nullable()->constrained('users')->onDelete('set null');
            $table->string('till_phone_no')->unique();
            $table->string('till_name');
            $table->string('network_provider');
            $table->string('till_code', 100);
            $table->enum('till_type', ['standard', 'payment_line'])->default('standard');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tills');
    }
};
