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
        Schema::create('mutualists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('first')->nullable();
            $table->string('last')->nullable();
            $table->string('sexe')->nullable();
            $table->string('phone')->nullable();
            $table->string('country')->nullable();
            $table->string('birth_date')->nullable();
            $table->string('place_birth')->nullable();
            $table->string('work')->nullable();
            $table->string('localisation')->nullable();
            $table->string('repere')->nullable();
            $table->string('identification_type')->nullable();
            $table->string('num_identification')->nullable();
            $table->string('date_delivry')->nullable();
            $table->string('date_receive')->nullable();
            $table->string('matrimonial')->nullable();
            $table->string('beneficiary')->nullable();
            $table->longText('id_card_smart')->nullable();
            // $table->boolean('done')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mutualists');
    }
};
