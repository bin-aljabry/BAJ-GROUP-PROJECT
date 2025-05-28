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
           
    $table->unsignedBigInteger('company_id');
    $table->unsignedBigInteger('branch_id');
    $table->decimal('amount', 15, 2);
    $table->unsignedBigInteger('created_by'); // Admin ID
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
