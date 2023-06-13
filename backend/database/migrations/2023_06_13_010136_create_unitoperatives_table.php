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
        Schema::create('unitoperatives', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char('id_company',36)->nullable();
            $table->string('unit_name');
            $table->string('unit_status');
            $table->integer('deleted')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unitoperatives');
    }
};
