<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Kurikulum;
use App\Models\Pelajaran;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('jadwal.index', ['jadwal' => Jadwal::get(), 'kurikulum' => Kurikulum::get()]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    Jadwal::create($request->all());

    return redirect()->back();
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Jadwal  $jadwal
   * @return \Illuminate\Http\Response
   */
  public function show(Jadwal $jadwal)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Jadwal  $jadwal
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    return view('jadwal.form', ['jadwal' => Jadwal::find($id)->first(), 'pelajaran' => Pelajaran::where('status', true)->get()]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Jadwal  $jadwal
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    if ($request->has('act')) {
      $i = 0;
      foreach ($request->jam as $key) {
        if (empty($key) === false) {
          $json[$key] = [
            'senin' => $request->senin[$i] ?? '',
            'selasa' => $request->selasa[$i] ?? '',
            'rabu' => $request->rabu[$i] ?? '',
            'kamis' => $request->kamis[$i] ?? '',
            'jumat' => $request->jumat[$i] ?? '',
            'sabtu' => $request->sabtu[$i] ?? '',
          ];
          $i++;
        }
      }

      Jadwal::find($id)->update(['jadwal' => json_encode($json)]);
    } else {
      Jadwal::find($id)->update($request->except('_token'));
    }

    return redirect(route('jadwal'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Jadwal  $jadwal
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    Jadwal::find($id)->delete();

    return redirect()->back();
  }
}
