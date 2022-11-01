<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelajaran extends Model
{
  use HasFactory;

  protected $table = 'pelajaran';

  protected $fillable = ['mapel', 'id_guru', 'status'];

  public function guru()
  {
    return $this->belongsTo(Guru::class, 'id_guru');
  }

  public static function booted()
  {
    static::creating(function (Model $model) {
      $model->kd_mapel = 'MP' . str_pad(static::max('id') + 1, 4, 0, STR_PAD_LEFT);
    });
  }
}
