<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    public function up()
    {
        Schema::create('mata_kuliah', function (Blueprint $table) {
            $table->id();
            $table->string('kode_mk', 6);
            $table->string('nama', 50);
            $table->foreignId('prodi_id')->constrained('prodi')->onDelete('restrict')->onUpdate('restrict');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('mata_kuliah');
    }
};
