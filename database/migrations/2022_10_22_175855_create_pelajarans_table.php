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
    Schema::create('pelajaran', function (Blueprint $table) {
      $table->id();
      $table->string('kd_mapel', 10);
      $table->string('mapel', 25);
      $table->enum('status', ['true', 'false'])->default('true');
      $table->foreignId('id_guru')->references('id')->on('guru')->onDelete('cascade');
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
  }
};
