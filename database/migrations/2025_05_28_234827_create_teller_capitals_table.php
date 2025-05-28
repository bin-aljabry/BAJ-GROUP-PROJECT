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
        Schema::create('teller_capitals', function (Blueprint $table) {
          
    $table->id();
    $table->unsignedBigInteger('branch_capital_id'); // FK: branch_capitals.id
    $table->unsignedBigInteger('manager_id');        // FK: users.id (role = manager)
    $table->unsignedBigInteger('teller_id');         // FK: users.id (role = teller)
    $table->decimal('amount', 15, 2);
    $table->timestamps();

    $table->foreign('branch_capital_id')->references('id')->on('branch_capitals')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teller_capitals');
    }
};
