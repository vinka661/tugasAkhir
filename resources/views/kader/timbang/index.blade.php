@extends('layout.master')
@section('konten')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">DATA TIMBANG BAYI BALITA</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="{{ route('createBB') }}"><button class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data</button></a>
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
                                            <th>Nama</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Umur (bln)</th>
                                            <th>Tempat Lahir</th>
                                            <th>Nama Ibu</th>
                                            <th>Nama Ayah</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($bayiBalita as $key => $data)
                                        @php
                                            $id = Auth::id();
                                        @endphp
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $data->nama_bayi }}</td>
                                            <td>{{ $data->tgl_lahir }}</td>
                                            <td>{{ $data->jk }}</td>
                                            <td>{{ $data->umur }}</td>
                                            <td>{{ $data->tempat_lahir }}</td>
                                            <td>{{ $data->nama_ibu }}</td>
                                            <td>{{ $data->nama_ayah }}</td>
                                            <td>
                                                <a href="{{ route('editBB', $data->id_bb) }}"><button  class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button></a>
                                                <a href="{{ route('deleteBB', $data->id_bb) }}"><button  class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button></a>
                                                <a href="{{ url('timbang/detailtimbangbayiBalita/'. $data->id_bb ) }}"><button  class="btn  btn-success btn-sm"><i class="fas fa-weight"></i> Timbang Bayi</button></a>
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