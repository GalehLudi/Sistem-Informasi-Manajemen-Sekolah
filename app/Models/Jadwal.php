<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
  use HasFactory;

  protected $table = 'jadwal';

  protected $fillable = ['kd_jadwal', 'id_kurikulum', 'jadwal'];

  public function kurikulum()
  {
    return $this->belongsTo(Kurikulum::class, 'id_kurikulum');
  }

  public function guru()
  {
    return $this->belongsToMany(Guru::class);
  }
}
