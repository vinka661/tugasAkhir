@extends('layout.master')
@section('konten')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">DATA TIMBANG BAYI/BALITA</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href=""><button class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data</button></a>
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
                                            <th>Nama Bayi</th>
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
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $data->user->name }}</td>
                                            <td>{{ $data->bayi_balita->nama_bayi }}</td>
                                            <td>{{ $data->tgl_timbang }}</td>
                                            <td>{{ $data->berat_badan}}</td>
                                            <td>{{ $data->tinggi_badan}}</td>
                                            <td>
                                                @if ($data->lingkar_kepala == NULL)
                                                    kosong
                                                @else
                                                    {{ $data->lingkar_kepala }}
                                                @endif
                                            </td>
                                            <td>{{ $data->status_gizi}}</td>
                                            <td>
                                                <a href=""><button  class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button></a>
                                                <a href=""><button  class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                  
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
  @endsection