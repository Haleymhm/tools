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
        Schema::create('users', function (Blueprint $table) {
            //$table->id();
            $table->uuid('id')->primary();
            $table->char('id_company',36)->nullable();
            $table->char('id_unitop',36)->nullable();
            $table->char('id_typeact',36)->nullable();
            $table->string('rutrif',15)->nullable()->unique(); //verificar a ver sise puede
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('photo')->nullable();
            $table->string('position')->nullable();
            $table->string('timezone')->nullable();
            $table->char('language',2)->nullable()->default("es");
            $table->integer('view')->default(0);
            $table->string('password');
            $table->char('status',1)->nullable()->default("A");
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
