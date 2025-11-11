<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('f1')->create('eredmeny', function (Blueprint $table) {
            $table->id();
            $table->date('datum');
            $table->foreignId('pilota_id')->nullable()->constrained('pilota')->nullOnDelete();
            $table->foreignId('gp_id')->nullable()->constrained('gp')->nullOnDelete();
            $table->integer('helyezes')->nullable();
            $table->string('hiba')->nullable();
            $table->string('csapat')->nullable();
            $table->string('auto')->nullable();
            $table->string('motor')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::connection('f1')->dropIfExists('eredmeny');
    }
};
