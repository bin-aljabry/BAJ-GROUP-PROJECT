<?php

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->integer('collection_id');
            $table->foreignIdFor(Category::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(SubCategory::class)->nullable();
            // $table->integer('sub_category_id')->nullable();
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->unsignedBigInteger('branch_id');
            $table->foreign('branch_id')->references('id')->on('company_branches')->onDelete('cascade');
     
            $table->string('phone')->nullable();
            $table->decimal('buying_price', 15, 2);
            $table->decimal('selling_price', 15, 2);
            $table->decimal('discount', 15, 2)->nullable();
            $table->integer('stock_quantity')->default(0);
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Product::class)->constrained()->onDelete('cascade');
            $table->string('image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_images');
    }
};
