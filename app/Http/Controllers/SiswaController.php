<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SiswaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('siswa.index', ['siswa' => Siswa::get()]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('siswa.form');
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
      'nis'    => ['required', Rule::unique('siswa'), 'regex:/^[0-9]+$/'],
      'nama'   => 'required',
      'jk'     => 'required',
      'alamat' => 'required'
    ], [
      'required'   => 'Bagian :attribute tidak boleh kosong.',
      'nis.unique' => 'Bagian :attribute harus bersifat unik.',
      'nis.regex'  => 'Bagian :attribute harus berupa angka'
    ], [
      'nis'    => 'NIS',
      'nama'   => 'Nama Siswa',
      'jk'     => 'Jenis kelamin',
      'alamat' => 'Alamat'
    ])->validate();

    Siswa::create($request->all());

    return redirect(route('siswa'));
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    return view('siswa.form', ['siswa' => Siswa::find($id)->first()]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    Validator::make($request->all(), [
      'nis'    => ['required', Rule::unique('siswa')->ignore($id), 'regex:/^[0-9]+$/'],
      'nama'   => 'required',
      'jk'     => 'required',
      'alamat' => 'required'
    ], [
      'required'   => 'Bagian :attribute tidak boleh kosong.',
      'nis.unique' => 'Bagian :attribute harus bersifat unik.',
      'nis.regex'  => 'Bagian :attribute harus berupa angka'
    ], [
      'nis'    => 'NIS',
      'nama'   => 'Nama Siswa',
      'jk'     => 'Jenis kelamin',
      'alamat' => 'Alamat'
    ])->validate();

    Siswa::find($id)->update($request->except('_token'));

    return redirect(route('siswa'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    Siswa::find($id)->delete();

    return redirect()->back();
  }
}
