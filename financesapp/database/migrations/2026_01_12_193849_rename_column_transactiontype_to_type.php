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
        Schema::table('Transactions', function (Blueprint $table) {
            $table->renameColumn('transactiontype', 'type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Transactions', function (Blueprint $table) {
            $table->renameColumn('type', 'transactiontype');
        });
    }
};
