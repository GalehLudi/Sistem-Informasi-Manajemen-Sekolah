<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guru extends Model
{
  use HasFactory;

  protected $table = 'guru';

  protected $fillable = ['nip', 'nama', 'jk', 'alamat'];
}
