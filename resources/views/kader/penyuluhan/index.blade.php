@extends('layout.master')
@section('konten')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">JADWAL PENYULUHAN</h1>
                    <!-- DataTales Example -->
                   
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif 
                        <div class="card-body">
                          
                                            {{-- <td>
                                                <a href="{{ route('editPenyuluhan', $data->id_penyuluhan) }}"><button  class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button></a>
                                                <a href="{{ route('deletePenyuluhan', $data->id_penyuluhan) }}"><button  class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button></a>
                                            </td>
                                        </tr> --}}
                                      
                            <div class="card" style="width: 60rem;">
                                @foreach($penyuluhanKader as $key => $data)
                                <div class="card-body">
                                  <h5 class="card-title"><i class="fas fa-calendar-alt"></i> Tanggal : {{ $data->tanggal }}</h5>
                                  <p class="card-text"><i class="fas fa-calendar-day"></i> Hari : {{ $data->hari }}</p>
                                  <p class="card-text"><i class="fas fa-book-medical"></i> Materi : {{ $data->materi }}</p>
                                </div>
                                <div class="col card-header text-right">
                                <a href="#" class="btn btn-primary"><i class="fas fa-file-upload"></i> Upload Materi </a>
                                </div>
                              </div>
                              @endforeach
                        </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
  @endsection