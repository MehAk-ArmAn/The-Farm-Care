<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_images', function (Blueprint $table) {
            $table->id(); // id

            $table->unsignedBigInteger('product_id'); // MUST MATCH products.id

            $table->string('image_path'); // image file path

            $table->timestamps();

            // foreign key
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade'); // delete images if product deleted
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_images');
    }
};
