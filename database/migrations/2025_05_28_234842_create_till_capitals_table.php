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
    Schema::create('till_capitals', function (Blueprint $table) {

    $table->id();

    $table->unsignedBigInteger('company_id')->nullable();
    $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');

    $table->unsignedBigInteger('branch_id')->nullable();
    $table->foreign('branch_id')->references('id')->on('company_branches')->onDelete('cascade');

    // Huyu ni manager anayejaza capital
    $table->foreignId('manager_id')->constrained('users')->onDelete('cascade');

    // Huyu ni teller anayehusishwa na capital hii
    $table->foreignId('teller_id')->constrained('users')->onDelete('cascade');

    // Till inayopatiwa capital hii
    $table->foreignId('till_id')->constrained('tills')->onDelete('cascade');

    // Kiasi cha capital
    $table->decimal('amount', 15, 2);

    $table->timestamps();
});

}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('till_capitals');
    }
};
