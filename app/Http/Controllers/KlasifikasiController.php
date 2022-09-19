<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Klasifikasi;
use App\Imports\KlasifikasiImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class KlasifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data_klasifikasi = \App\Klasifikasi::all();
        return view('klasifikasi.index',['data_klasifikasi'=> $data_klasifikasi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('klasifikasi/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tambah(Request $request)
    {
        $request->validate([
            'nama' => 'unique:klasifikasi|min:5',
            'kode' => 'unique:klasifikasi|max:2',
        ]);
       $klasifikasi = new Klasifikasi();
       $klasifikasi->nama   = $request->input('nama');
       $klasifikasi->kode   = $request->input('kode');
       $klasifikasi->save();
       return redirect('/klasifikasi/index')->with("sukses", "Data Klasifikasi Berhasil Ditambahkan");
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
    public function edit($id_klasifikasi)
    {
        $klasifikasi = \App\Klasifikasi::find($id_klasifikasi);
        return view('klasifikasi/edit',['klasifikasi'=>$klasifikasi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_klasifikasi)
    {
        $request->validate([
            'nama' => 'min:5',
            'kode' => 'max:2',
        ]);
        $klasifikasi = \App\Klasifikasi::find($id_klasifikasi);
        $klasifikasi->update($request->all());
        $klasifikasi->save();
        return redirect('klasifikasi/index') ->with('sukses','Data Klasifikasi Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id_klasifikasi)
    {
        $klasifikasi=\App\Klasifikasi::find($id_klasifikasi);
        $klasifikasi->delete();
        return redirect('klasifikasi/index') ->with('sukses','Data Klasifikasi Berhasil Dihapus');
    }
    public function search(Request $request){
        $keyword = $request->search;

    $klasifikasi = Klasifikasi::where('nama', 'like', "%" . $keyword . "%")->paginate(5);
    return view('klasifikasi.search', compact('klasifikasi'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

}
