<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suratmasuk', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_surat')->unique();
            $table->string('asal_surat')->nullable();
            $table->text('isi')->nullable();
            $table->char('kode')->nullable();
            $table->date('tgl_surat')->nullable();
            $table->date('tgl_terima')->nullable();
            $table->string('filemasuk')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suratmasuk');
    }
};
