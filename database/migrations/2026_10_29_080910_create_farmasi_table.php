<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('data obat', function (Blueprint $table) {
            $table->increments('No');
            $table->string('Kode_obat', 10);
            $table->string('Nama_obat');
            $table->string('Kategori', 50);
            $table->string('pabrikan',100);
            $table->enum('sediaan', [
                'Table',
                'Sirup'
            ])->default('Available');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('data Obat');
    }
};
