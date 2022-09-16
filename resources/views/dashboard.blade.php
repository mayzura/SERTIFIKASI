@extends('layouts.master')
@section('content')
<section class="content card" style="padding: 10px 10px 10px 10px ">
    <div class="box">
        <div class="row">
            <div class="col">
                <center>
                    <h3 class="font-weight-bold">SELAMAT DATANG DI BERANDA ARSIP</h3>
                    <hr />
                </center>
                <br>
            </div>
        </div>

        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-3">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-1">
                                        <a href="/suratmasuk/index" class="small-box-footer bg-orange">
                                        {{-- <h3>{{DB::table('suratmasuk')->count()}}</h3> --}}
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">SURAT MASUK</div>
                                        </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-envelope-open-text fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
            </div></a>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-3">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-1">
                                            <div class="row no-gutters align-items-center">
                                            <a href="/klasifikasi/index" class="small-box-footer bg-orange">
                                            {{-- <h3>{{DB::table('klasifikasi')->count()}}</h3> --}}
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">KATEGORI</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div></a>
                    
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
