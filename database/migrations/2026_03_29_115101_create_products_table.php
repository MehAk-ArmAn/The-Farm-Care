<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // products table
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // bigint unsigned
            $table->string('name'); // product name
            $table->text('description')->nullable(); // desc
            $table->decimal('price', 10, 2)->nullable(); // price
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
