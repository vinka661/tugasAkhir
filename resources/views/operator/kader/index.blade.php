@extends('layout.master')
@section('konten')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">DATA KADER</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
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
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>Posyandu</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($kader as $key => $data)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->jenis_kelamin }}</td>
                                            <td>{{ $data->alamat }}</td>
                                            <td>{{ $data->nama_posyandu }}</td>
                                            <td>
                                                <a href="{{ route('editKader', $data->id) }}"><button  class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button></a>
                                                <a href="{{ route('deleteKader', $data->id) }}"><button  class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button></a>
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