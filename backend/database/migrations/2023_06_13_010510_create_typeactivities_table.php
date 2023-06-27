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
        Schema::create('typeactivities', function (Blueprint $table) {
            $table->uuid();
            $table->char('id_company',36)->nullable();
            $table->string('type_title');
            $table->text('type_description');
            $table->string('type_color',8)->default("#AEB6BF");
            $table->char('type_view',3)->nullable()->default("cal");
            $table->char('mcal',2)->nullable()->default("SI");
            $table->char('mind',2)->nullable()->default("SI");
            $table->integer('parent')->default(0);
            $table->integer('orden')->default(0);
            $table->char('icono',36)->nullable()->default("fa fa-plus");
            $table->char('tmenu',1)->nullable()->default("T");
            $table->integer('type_status',1)->default(1);
            $table->integer('type_deleted')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('typeactivities');
    }
};
