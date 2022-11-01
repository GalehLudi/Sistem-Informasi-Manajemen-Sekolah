<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Kurikulum;
use App\Models\Pelajaran;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class PDFController extends Controller
{
  public function index(Request $request, $param)
  {
    if ($param === 'siswa')
      $data = Siswa::get();

    if ($param === 'guru')
      $data = Guru::get();

    if ($param === 'pelajaran')
      $data = Pelajaran::get();

    if ($param === 'kurikulum')
      $data = Kurikulum::get();

    if ($param === 'jadwal')
      $data = Jadwal::get();

    if ($param === 'user')
      $data = User::get();

    $pdf = Pdf::loadView("pdf.$param", compact('data'));
    if ($request->get('download') && $request->get('download') == 1)
      return $pdf->download(now() . "-$param.pdf");

    return $pdf->stream();
  }
}
