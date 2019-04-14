<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use App\Jabatan;


class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data(Request $request){
        $pegawai = Pegawai::leftJoin('jabatan','jabatan.id_jabatan','=','pegawai.id_jabatan')->get();
        return response()->json($pegawai);
    }
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan = Jabatan::all();
        return response()->json($jabatan);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pegawai = new Pegawai;
        $pegawai->nama_pegawai = $request['nama_pegawai'];
        $pegawai->jenis_kelamin = $request['jenis_kelamin'];
        $pegawai->tgl_lahir = $request['tgl_lahir'];
        $pegawai->id_jabatan = $request['id_jabatan'];
        $pegawai->save();

        return response()->json($request);
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
        $pegawai = Pegawai::find($id);
        $jabatan = Jabatan::all();

        return response()->json(['pegawai' => $pegawai,'jabatan' => $jabatan]);
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
        $pegawai = Pegawai::find($id);
        $pegawai->nama_pegawai = $request['nama_pegawai'];
        $pegawai->jenis_kelamin = $request['jenis_kelamin'];
        $pegawai->tgl_lahir = $request['tgl_lahir'];
        $pegawai->id_jabatan = $request['id_jabatan'];

        $pegawai->update();
        return response()->json($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::find($id);
        $pegawai->delete();
        return response()->json($pegawai);
    }
}
