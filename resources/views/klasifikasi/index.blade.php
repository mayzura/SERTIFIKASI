@extends('layouts.master')
@section('content')
<section class="content card" style="padding: 10px 10px 10px 10px ">
    <div class="box">
        @if(session('sukses'))
        <div class="alert alert-success" role="alert">
            {{session('sukses')}}
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="row">
            <div class="col">
                <h3><i class="nav-icon fas fa-clipboard-list my-1 btn-sm-1"></i> Kategori Surat</h3>
                <hr>
            </div>
        </div>
        <div>
            <div class="col">
                <a class="btn btn-primary btn-sm my-1 mr-sm-1" href="create" role="button"><i class="fas fa-plus"></i>
                    Tambah Data</a>
                <br>
            </div>
        </div>
        <br>
        <form class="form" method="get" action="/klasifikasi/search">
            <div class="form-group w-100 mb-3">
                <label for="search" class="d-block mr-2">Pencarian</label>
                <input type="text" name="search" class="form-control w-75 d-inline" value="{{ old('search') }}" id="search" placeholder="Masukkan keyword">
                <button type="submit" class="btn btn-primary mb-1">Cari</button>
            </div>
        </form>
        <div class="row table-responsive">
            <div class="col-12">
                <table class="table table-hover table-head-fixed" id='tabelKlasifikasi'>
                    <thead>
                        <tr class="bg-light">
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Kode</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;?>
                        @foreach($data_klasifikasi as $klasifikasi)
                        <?php $no++ ;?>
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$klasifikasi->nama}}</td>
                            <td>{{$klasifikasi->kode}}</td>
                            <td>
                                <a href="/klasifikasi/{{$klasifikasi->id}}/edit"
                                    class="btn btn-primary btn-sm my-1 mr-sm-1"><i
                                        class="nav-icon fas fa-pencil-alt"></i> Edit</a>
                                <a href="/klasifikasi/{{$klasifikasi->id}}/delete"
                                    class="btn btn-danger btn-sm my-1 mr-sm-1"
                                    onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?')"><i class="nav-icon fas fa-trash"></i>
                                    Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>
        </div>

        <!-- Modal Tambah -->
        <div class="modal fade tambahklasifikasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><i
                                class="nav-icon fas fa-layer-group my-1 btn-sm-1"></i> Tambah Data Kategori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/klasifikasi/tambah" method="POST">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col">
                                    <label for="nama">Nama</label>
                                    <input name="nama" type="text" class="form-control bg-light" id="nama"
                                        placeholder="Nama Klasifikasi" required>
                                    <label for="kode">Kode</label>
                                    <input name="kode" type="text" class="form-control bg-light" id="kode"
                                        placeholder="Kode Klasifikasi" required>
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i>
                                SIMPAN</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section><br>
@endsection
