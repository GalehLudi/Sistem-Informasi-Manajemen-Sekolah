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
    Schema::create('siswa', function (Blueprint $table) {
      $table->id();
      $table->bigInteger('nis')->unique();
      $table->string('nama', 45);
      $table->enum('jk', ['Laki-laki', 'Perempuan'])->nullable();
      $table->string('alamat', 55);
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
    Schema::dropIfExists('siswa');
  }
};
