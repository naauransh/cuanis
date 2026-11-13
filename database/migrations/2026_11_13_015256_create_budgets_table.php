<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('kategori_id')->nullable()->constrained('kategoris')->onDelete('cascade');
            $table->string('nama');
            $table->decimal('batas', 12, 2);
            $table->decimal('terpakai', 12, 2)->default(0);
            $table->string('warna')->default('var(--peach)');
            $table->boolean('is_target')->default(false); // false = budget bulanan, true = target tabungan
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('budgets');
    }
};