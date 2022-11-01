<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class GuruController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('guru.index', ['guru' => Guru::get()]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('guru.form');
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
      'nip'    => ['required', Rule::unique('guru'), 'regex:/^[0-9]+$/'],
      'nama'   => 'required',
      'jk'     => 'required',
      'alamat' => 'required'
    ], [
      'required'   => 'Bagian :attribute tidak boleh kosong.',
      'nip.unique' => 'Bagian :attribute harus bersifat unik.',
      'nip.regex'  => 'Bagian :attribute harus berupa angka'
    ], [
      'nip'    => 'NIP',
      'nama'   => 'Nama Guru',
      'jk'     => 'Jenis kelamin',
      'alamat' => 'Alamat'
    ])->validate();

    Guru::create($request->all());

    return redirect(route('guru'));
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Guru  $guru
   * @return \Illuminate\Http\Response
   */
  public function show(Guru $guru)
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
    return view('guru.form', ['guru' => Guru::find($id)->first()]);
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
      'nip'    => ['required', Rule::unique('guru')->ignore($id), 'regex:/^[0-9]+$/'],
      'nama'   => 'required',
      'jk'     => 'required',
      'alamat' => 'required'
    ], [
      'required'   => 'Bagian :attribute tidak boleh kosong.',
      'nip.unique' => 'Bagian :attribute harus bersifat unik.',
      'nip.regex'  => 'Bagian :attribute harus berupa angka'
    ], [
      'nip'    => 'NIP',
      'nama'   => 'Nama Guru',
      'jk'     => 'Jenis kelamin',
      'alamat' => 'Alamat'
    ])->validate();

    Guru::find($id)->update($request->except('_token'));

    return redirect(route('guru'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    Guru::find($id)->delete();

    return redirect()->back();
  }
}
