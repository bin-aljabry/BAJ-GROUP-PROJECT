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
        Schema::create('bank_capitals', function (Blueprint $table) {
             $table->id();
    $table->unsignedBigInteger('teller_capital_id'); // FK: teller_capitals.id
    $table->string('bank_name');
    $table->string('account_number');
    $table->decimal('amount', 15, 2);
    $table->timestamps();

    $table->foreign('teller_capital_id')->references('id')->on('teller_capitals')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_capitals');
    }
};
