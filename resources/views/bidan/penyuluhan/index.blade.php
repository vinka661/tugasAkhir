@extends('layout.master')
@section('konten')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">JADWAL PENYULUHAN</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="{{ route('createPenyuluhan') }}"><button class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data</button></a>
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
                                            <th>Hari</th>
                                            <th>Tanggal</th>
                                            <th>Materi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($penyuluhan as $key => $data)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $data->user->name }}</td>
                                            <td>{{ $data->hari }}</td>
                                            <td>{{ $data->tanggal }}</td>
                                            <td>{{ $data->materi }}</td>
                                            <td>
                                                <a href="{{ route('editPenyuluhan', $data->id_penyuluhan) }}"><button  class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button></a>
                                                <a href="{{ route('deletePenyuluhan', $data->id_penyuluhan) }}"><button  class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button></a>
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