<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
  use HasFactory;

  protected $table = 'siswa';

  protected $fillable = ['nama', 'jk', 'alamat'];

  public static function booted()
  {
    static::creating(function (Model $model) {
      $model->nis = date('ym') . $model->max('id') + 1;
    });
  }
}
