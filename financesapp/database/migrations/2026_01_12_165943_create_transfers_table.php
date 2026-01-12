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
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('wallet_fromid')->constrained('wallets')->cascadeOnDelete();
            $table->foreignid('wallets_inid')->constrained('wallets')->cascadeOnDelete();
            $table->decimal('amount', 15, 2);
            $table->date('date');
            $table->string('description')->nullable();
            $table->string('currency', 10)->default('RSD');
            $table->decimal('comission', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfers');
    }
};
