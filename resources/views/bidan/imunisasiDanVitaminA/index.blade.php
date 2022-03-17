@extends('layout.master')
@section('konten')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">DATA PEMBERIAN IMUNISASI</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="{{ route('createImunisasi') }}"><button class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data</button></a>
                        </div>
                        @if ($message = Session::get('success1'))
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
                                            <th>Nama Bayi</th>
                                            <th>Umur (bln)</th>
                                            <th>Vaksin</th>
                                            <th>Tanggal Pemberian</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($imunisasi as $key => $data)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $data->bayi_balita->nama_bayi}}</td>
                                            <td>{{ $data->bayi_balita->umur}}</td>
                                            <td>{{ $data->jenis_vaksin->nama_vaksin}}</td>
                                            <td>{{ $data->tanggal_beri_imunisasi }}</td>
                                            <td>
                                                <a href="{{ route('editImunisasi', $data->id_imunisasi) }}"><button  class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button></a>
                                                <a href="{{ route('deleteImunisasi', $data->id_imunisasi) }}"><button  class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button></a>
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

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">DATA PEMBERIAN VITAMIN A </h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="{{ route('createVitaminA') }}"><button class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data</button></a>
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
                                            <th>Nama Bayi</th>
                                            <th>Umur (bln)</th>
                                            <th>Kapsul</th>
                                            <th>Tanggal Pemberian</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($vitaminA as $key => $data)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $data->bayi_balita->nama_bayi}}</td>
                                            <td>{{ $data->bayi_balita->umur}}</td>
                                            <td>{{ $data->kapsul_vitaminA }}</td>
                                            <td>{{ $data->tanggal_beri_vitaminA }}</td>
                                            <td>
                                                <a href="{{ route('editVitaminA', $data->id_vitaminA) }}"><button  class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button></a>
                                                <a href="{{ route('deleteVitaminA', $data->id_vitaminA) }}"><button  class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button></a>
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