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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->char('nisn', 10);
            $table->char('nis', 8);
            $table->string('password');
            $table->string('nama');
            $table->text('pas_foto')->nullable();
            $table->foreignId('id_kelas')->constrained('kelas');
            $table->text('alamat');
            $table->string('no_telp', 13);
            $table->foreignId('id_spp')->constrained('spps');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
