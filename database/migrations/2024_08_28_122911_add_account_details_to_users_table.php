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
        Schema::table('users', function (Blueprint $table) {
            $table->decimal('account_amount', 8, 2)->default(0);
            $table->integer('bundles_remaining')->default(0);
            $table->timestamp('bundle_purchase_date')->nullable();
            $table->timestamp('bundle_expiry_date')->nullable();
            $table->string('bundle_speed')->nullable();
            $table->integer('time_remaining_in_seconds')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'account_amount',
                'bundles_remaining',
                'bundle_purchase_date',
                'bundle_expiry_date',
                'bundle_speed',
                'time_remaining_in_seconds',
            ]);
        });
    }
};
