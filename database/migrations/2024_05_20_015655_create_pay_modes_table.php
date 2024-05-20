<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pay_modes', function (Blueprint $table) {
            $table->id();
            $table->string('mode');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pay_modes');
    }
};
