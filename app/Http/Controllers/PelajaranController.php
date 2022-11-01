<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Pelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PelajaranController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('pelajaran.index', ['pelajaran' => Pelajaran::get(), 'guru' => Guru::get()]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    dd(Request()->input('status'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    Validator::make($request->all(), [
      'mapel' => 'required',
      'id_guru' => 'required'
    ], [
      'required' => 'Bidang :attribute tidak boleh kosong.'
    ], [
      'mapel' => 'Mata Pelajaran',
      'id_guru' => 'Guru'
    ])->validate();

    Pelajaran::create(['mapel' => $request->mapel, 'id_guru' => $request->id_guru, 'status' => $request->status ? 'true' : 'false']);

    return redirect()->back();
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Pelajaran  $pelajaran
   * @return \Illuminate\Http\Response
   */
  public function show(Pelajaran $pelajaran)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Pelajaran  $pelajaran
   * @return \Illuminate\Http\Response
   */
  public function edit(Pelajaran $pelajaran)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Pelajaran  $pelajaran
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    session()->flash('previous', $request->segment(3));

    Validator::make($request->all(), [
      'mapel' => 'required',
      'id_guru' => 'required'
    ], [
      'required' => 'Bidang :attribute tidak boleh kosong.'
    ], [
      'mapel' => 'Mata Pelajaran',
      'id_guru' => 'Guru'
    ])->validate();

    Pelajaran::find($id)->update(['mapel' => $request->mapel, 'id_guru' => $request->id_guru, 'status' => $request->status ? 'true' : 'false']);

    return redirect()->back();
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Pelajaran  $pelajaran
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    Pelajaran::find($id)->delete();

    return redirect()->back();
  }
}
