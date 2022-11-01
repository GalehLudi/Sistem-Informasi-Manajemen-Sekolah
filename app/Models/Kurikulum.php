<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kurikulum extends Model
{
  use HasFactory;

  protected $table = 'kurikulum';

  protected $fillable = ['semester', 'tahun'];

  public function jadwal()
  {
    return $this->hasMany(Jadwal::class);
  }

  public static function booted()
  {
    static::creating(function (Model $model) {
      $model->kd_kurikulum = Str::substr($model->tahun, 2, 2) . str_pad($model->semester, 3, 0, STR_PAD_LEFT);
    });

    static::updating(function (Model $model) {
      $model->kd_kurikulum = Str::substr($model->tahun, 2, 2) . str_pad($model->semester, 3, 0, STR_PAD_LEFT);
    });
  }
}
