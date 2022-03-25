@extends('layout.master')
@section('konten')
                <!-- Begin Page Content -->
                {{-- <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">JADWAL POSYANDU</h1>
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
                                            <th>Nama posyandu</th>
                                            <th>Hari</th>
                                            <th>Jam</th>
                                            <th>Tanggal</th>
                                            <th>Agenda</th>
                                            <th>Tempat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($jadwalPosyanduBayi as $key => $data)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $data->posyandu->nama_posyandu}}</td>
                                            <td>{{ $data->hari }}</td>
                                            <td>{{ $data->jam }}</td>
                                            <td>{{ $data->tanggal }}</td>
                                            <td>{{ $data->agenda }}</td>
                                            <td>{{ $data->tempat }}</td>
                                            
                                        </tr>
                                        @endforeach
                                    </tbody>
                                  
                                </table>
                            </div>
                        </div>
                    </div>

                </div> --}}
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">JADWAL POSYANDU</h1>
                    <!-- DataTales Example -->
                   
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif 
                        <div class="card-body">
                            <div class="card" style="width: 60rem;">
                                @foreach($jadwalPosyanduBayi as $key => $data)
                                <div class="card-body">
                                  <h5 class="card-title"><i class="fas fa-hospital-alt"></i> nama Posyandu: {{ $data->posyandu->nama_posyandu}}</h5>
                                  <p class="card-text"><i class="fas fa-calendar-day"></i> Hari :  {{ $data->hari }}</p>
                                  <p class="card-text"><i class="fas fa-clock"></i> Pukul : {{ $data->jam }}</p>
                                  <p class="card-text"><i class="fas fa-calendar-alt"></i>Tanggal : {{ $data->tanggal }}</p>
                                  <p class="card-text"><i class="fas fa-calendar-check"></i> Agenda : {{ $data->agenda }}</p>
                                  <p class="card-text"><i class="fas fa-clinic-medical"></i>Tempat : {{ $data->tempat }}</p>
                                </div>
                                
                              </div>
                              @endforeach
                        </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
  @endsection