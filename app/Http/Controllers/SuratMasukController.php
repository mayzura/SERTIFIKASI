<?php

namespace App\Http\Controllers;


use App\SuratMasuk;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PDF;
use Excel;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_suratmasuk = \App\SuratMasuk::all();
        return view('suratmasuk.index',['data_suratmasuk'=> $data_suratmasuk]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_klasifikasi = \App\Klasifikasi::all();
        return view('suratmasuk/create', ['data_klasifikasi' => $data_klasifikasi]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tambah (Request $request)
     {
        $request->validate([
            'filemasuk'  => 'mimes:jpg,jpeg,png,doc,docx,pdf',
            'no_surat'   => 'unique:suratmasuk|min:5',
            'isi'        => 'min:5',
        ]);
        $suratmasuk = new SuratMasuk();
        $suratmasuk->no_surat   = $request->input('no_surat');
        $suratmasuk->kode       = $request->input('kode');
        $suratmasuk->isi        = $request->input('isi');
        $file                   = $request->file('filemasuk');
        $fileName   = 'suratMasuk-'. $file->getClientOriginalName();
        $file->move('datasuratmasuk/', $fileName);
        $suratmasuk->filemasuk  = $fileName;
        $suratmasuk->save();
        return redirect('/suratmasuk/index')->with("sukses", "Data Surat Masuk Berhasil Ditambahkan");

     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tampil($id_suratmasuk)
    {
        $suratmasuk = \App\SuratMasuk::find($id_suratmasuk);
        return view('suratmasuk/tampil',['suratmasuk'=>$suratmasuk]);
    }

    //function untuk download file
    public function downfunc(){

        $downloads=DB::table('suratmasuk')->get();
        return view('suratmasuk.tampil',compact('downloads'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit ($id_suratmasuk)
    {
        $data_klasifikasi = \App\Klasifikasi::all();
        $suratmasuk = \App\SuratMasuk::find($id_suratmasuk);
        return view('suratmasuk/edit',['suratmasuk'=>$suratmasuk],['data_klasifikasi'=>$data_klasifikasi]);
    }
    public function update (Request $request, $id_suratmasuk)
    {
        $request->validate([
            'filemasuk' => 'mimes:jpg,jpeg,png,doc,docx,pdf',
            'no_surat' => 'min:5',
            'isi'      => 'min:5',

        ]);
        $suratmasuk = \App\SuratMasuk::find($id_suratmasuk);
        $suratmasuk->update($request->all());
        //Untuk Update File
        if($request->hasFile('filemasuk')){
            $request->file('filemasuk')->move('datasuratmasuk/','suratMasuk-'. $request->file('filemasuk')->getClientOriginalName());
            $suratmasuk->filemasuk = 'suratMasuk-'. $request->file('filemasuk')->getClientOriginalName();
            $suratmasuk->save();
        }
        return redirect('suratmasuk/index') ->with('sukses','Data Surat Masuk Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id_suratmasuk)
    {
        $suratmasuk=\App\SuratMasuk::find($id_suratmasuk);
        $suratmasuk->delete();
        return redirect('suratmasuk/index')->with('sukses','Data Surat Masuk Berhasil Dihapus');
    }
}
