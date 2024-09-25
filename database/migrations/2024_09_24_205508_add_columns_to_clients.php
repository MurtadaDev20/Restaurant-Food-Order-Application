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
        Schema::table('clients', function (Blueprint $table) {
            $table->unsignedBigInteger('city_id')->nullable()->after('address');
            $table->text('shop_info')->nullable()->after('city_id');
            $table->string('cover_photo')->nullable()->after('shop_info');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn(['city_id', 'shop_info', 'cover_photo']);
        });
    }
};
