<head>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style1.css">
</head>
@extends('layout.master')
@section('konten')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">HASIL PERKEMBANGAN</h1>
        <!-- DataTales Example -->
        @foreach($hasilPerkembangan as $key => $data)
        <div class="card-body">
            <div class="card" style="width: 50rem; background: #A7C0EA; color: black; padding-left: 30px; padding-top: 10px;">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Nama</h6>
                        </div>
                        <dd class="col-sm-8">{{ $data->nama_bayi }}</dd>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Jenis Kelamin</h6>
                        </div>
                        <dd class="col-sm-8">{{ $data->jk }}</dd>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Tanggal Timbang</h6>
                        </div>
                        <dd class="col-sm-8">{{ $data->tgl_timbang }}</dd>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Status Gizi</h6>
                        </div>
                        <dd class="col-sm-8">{{ $data->status_gizi }}</dd>
                    </div>
                </div>
                <div class="col card-header text-right" style="background: #A7C0EA;">
                    <a href="#pesan" data-toggle="modal" class="btn btn-primary" style="background: #F08080;"><i
                            class="fas fa-comment"></i> Cek Status Gizi </a>
                </div>
                <div class="modal fade" id="pesan" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3>STATUS GIZI</h3>
                            </div>
                            <div class="modal-body">
                                    <div class="card-body">
                                        <p>{{ $data->status_gizi }}</p>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        @endforeach
    </div>
    </div>
    <!-- End of Main Content -->
    
@endsection
