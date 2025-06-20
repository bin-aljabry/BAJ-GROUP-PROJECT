<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  // database/migrations/xxxx_xx_xx_create_orders_table.php

public function up()
{
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        
        $table->foreignId('branch_id')->constrained()->onDelete('cascade');
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Aliyepokea order
        $table->string('customer_name')->nullable();
        $table->string('status')->default('pending'); // pending, processing, completed, cancelled
        $table->decimal('total_amount', 12, 2)->default(0);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
