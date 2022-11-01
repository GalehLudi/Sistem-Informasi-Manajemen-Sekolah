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
    Schema::create('guru', function (Blueprint $table) {
      $table->id();
      $table->bigInteger('nip')->unique();
      $table->string('nama', 45);
      $table->enum('jk', ['Laki-laki', 'Perempuan']);
      $table->string('alamat', 50)->nullable();
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
    Schema::dropIfExists('pelajaran');
    Schema::dropIfExists('guru');
  }
};
