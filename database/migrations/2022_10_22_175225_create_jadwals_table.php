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
    Schema::create('jadwal', function (Blueprint $table) {
      $table->id();
      $table->string('kd_jadwal');
      $table->foreignId('id_kurikulum')->refereces('id')->on('kurikulum')->onDelete('cascade');
      $table->json('jadwal')->nullable();
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
    Schema::dropIfExists('jadwal');
  }
};
