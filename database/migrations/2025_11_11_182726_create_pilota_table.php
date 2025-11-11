<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('f1')->create('pilota', function (Blueprint $table) {
            $table->id();
            $table->string('nev');
            $table->char('nem', 1);
            $table->date('szuletett')->nullable();
            $table->string('nemzetiseg');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::connection('f1')->dropIfExists('pilota');
    }
};
