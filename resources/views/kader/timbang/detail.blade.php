@extends('layout.master')
@section('konten')
    <!-- Content Header (Page header) -->
    <section>
        <div class="container ">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h2 class="m-0 text-dark"><strong>Timbang Bayi Balita</strong></h2></br>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-primary card-outline">
                                <form role="form" action="" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="nama_bayi"><strong>Nama Bayi/Balita</strong></label><br>
                                            <input type="text" class="form-control" id="nama_bayi" name="nama_bayi" value="{{ $bayiBalita->nama_bayi }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_kelamin"><strong>Jenis Kelamin</strong></label>
                                            <input type="text" class="form-control" required="jenis_kelamin" id="jenis_kelamintanggal"
                                                name="jenis_kelamin" value="{{ $bayiBalita->jk }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="umur"><strong>Umur (Bulan)</strong></label>
                                            <input type="text" class="form-control" required="required" id="umur"
                                                name="umur" value="{{ $bayiBalita->umur }}" disabled>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div> <br>
            <div class="container-fluid">
                <h1 class="h3 mb-2 text-gray-800">Data Timbang Bayi/Balita</h1>
                @php
                    $id = Auth::id();
                @endphp
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        @if ($canAdd)
                            <a href="{{ url('timbang/createTimbang/' . $bayiBalita->id_bb . '/' . $id) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> Tambah Data Timbang
                            </a>
                        @else
                            <button type="button" class="btn btn-primary btn-sm" disabled>
                                <i class="fas fa-plus"></i> Tambah Data Timbang
                            </button>
                        @endif
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kader</th>
                                        <th>Tanggal Timbang</th>
                                        <th>BB</th>
                                        <th>TB</th>
                                        <th>LK</th>
                                        <th>Status Gizi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($timbang as $key => $data)
                                    @if ($data->user->id == Auth::user()->id)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $data->user->name }}</td>
                                        <td>{{ $data->tgl_timbang }}</td>
                                        <td>{{ $data->berat_badan}}</td>
                                        <td>
                                            @if ($data->tinggi_badan == NULL)
                                                -
                                            @else
                                                {{ $data->tinggi_badan }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($data->lingkar_kepala == NULL)
                                                -
                                            @else
                                                {{ $data->lingkar_kepala }}
                                            @endif
                                        </td>
                                        <td>{{ $data->status_gizi}}</td>
                                        <td>
                                            <a href="{{ route('editTimbang', $data->id_timbang) }}"><button  class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button></a>
                                            <a href="{{ route('deleteTimbang', $data->id_timbang) }}"><button  class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button></a>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    @endsection
