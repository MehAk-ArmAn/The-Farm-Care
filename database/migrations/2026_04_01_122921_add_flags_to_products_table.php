<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (!Schema::hasColumn('products', 'is_active')) {
                $table->boolean('is_active')->default(true);
            }

            if (!Schema::hasColumn('products', 'is_featured')) {
                $table->boolean('is_featured')->default(false);
            }
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $drop = [];

            if (Schema::hasColumn('products', 'is_active')) {
                $drop[] = 'is_active';
            }

            if (Schema::hasColumn('products', 'is_featured')) {
                $drop[] = 'is_featured';
            }

            if (!empty($drop)) {
                $table->dropColumn($drop);
            }
        });
    }
};
