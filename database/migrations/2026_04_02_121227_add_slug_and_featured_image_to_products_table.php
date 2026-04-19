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
        Schema::table('products', function (Blueprint $table) {

            if (!Schema::hasColumn('products', 'slug')) {
                $table->string('slug')->unique()->after('name');
            }

            if (!Schema::hasColumn('products', 'featured_image')) {
                $table->string('featured_image')->nullable()->after('description');
            }

        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {

            if (Schema::hasColumn('products', 'slug')) {
                $table->dropColumn('slug');
            }

            if (Schema::hasColumn('products', 'featured_image')) {
                $table->dropColumn('featured_image');
            }

        });
    }
};
