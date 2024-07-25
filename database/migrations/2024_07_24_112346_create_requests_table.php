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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mutualist_id')->references('id')->on('mutualists')->onDelete('cascade');
            $table->foreignId('amount_year_id')->references('id')->on('amount_years')->onDelete('cascade');
            $table->foreignId('transaction_id')->references('id')->on('transactions')->onDelete('cascade');
            $table->string('new_amount');
            $table->string('old_amount');
            $table->string('content');
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
