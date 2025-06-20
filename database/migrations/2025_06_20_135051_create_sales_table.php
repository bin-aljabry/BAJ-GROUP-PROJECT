<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_sales_table.php

public function up()
{
    Schema::create('sales', function (Blueprint $table) {
        $table->id();
        $table->foreignId('order_id')->nullable()->constrained()->onDelete('set null');
        $table->foreignId('branch_id')->constrained()->onDelete('cascade');
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Aliyeuza
        $table->foreignId('product_id')->constrained()->onDelete('cascade');
        $table->integer('quantity');
        $table->decimal('unit_price', 12, 2);
        $table->decimal('discount', 12, 2)->default(0);
        $table->decimal('total_price', 12, 2);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
