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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('brand');
            $table->string('address');
            $table->unsignedInteger('user_limit')->default(3);
            $table->string('slug')->unique();

    $table->string('phone')->nullable();
    $table->enum('status', ['active', 'blocked'])->default('active');
    $table->enum('payment_status', ['paid', 'unpaid'])->default('unpaid');
    $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
