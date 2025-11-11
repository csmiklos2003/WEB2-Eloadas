<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('f1')->create('gp', function (Blueprint $table) {
            $table->id();
            $table->date('datum');
            $table->string('nev');
            $table->string('orszag');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::connection('f1')->dropIfExists('gp');
    }
};
