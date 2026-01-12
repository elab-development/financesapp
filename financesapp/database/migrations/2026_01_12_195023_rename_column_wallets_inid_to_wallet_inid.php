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
        Schema::table('Transfers', function (Blueprint $table) {
            $table->renameColumn('wallets_inid', 'wallet_inid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Transfers', function (Blueprint $table) {
            $table->renameColumn('wallet_inid', 'wallets_inid');
        });
    }
};
