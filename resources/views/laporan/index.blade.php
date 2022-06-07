@extends('layout.master')
@section('konten')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">DATA LAPORAN</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            @if ($setuju)
                                <!-- <input id="search" type="text" name="search"> -->
                                <!-- {{-- <a href="laporan/cetak_pdf/2022-06-08" target="_blank" class="btn btn-success btn-sm"><i
                                    class="fas fa-print"></i> Cetak Pdf</a> --}} -->
                                <!-- {{-- <input type='text' id='search' name='search' placeholder='Enter '>
                                    <input type='button' value='Search' id='but_search'> --}} -->
                                <a href="{{ route('cetak_pdf') }}" target="_blank" class="btn btn-success btn-sm"><i
                                        class="fas fa-print"></i> Cetak Pdf</a>
                                <a href="{{ route('exportLaporan') }}" target="_blank" class="btn btn-success btn-sm"><i
                                        class="fas fa-print"></i> Cetak Excel</a>
                            @else
                                @can('kepala-plkb')
                                    <a href="{{ route('laporansetuju') }}" class="btn btn-success btn-sm"><i class="fas fa-check"></i>
                                        Setujui</a>
                                @endcan
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Posyandu</th>
                                            <th>Kader</th>
                                            <th>Bayi/Balita</th>
                                            <th>BB</th>
                                            <th>TB</th>
                                            <th>LK</th>
                                            <th>Status Gizi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($laporan as $key => $data)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $data->tgl_timbang }}</td>
                                            <td>{{ $data->nama_posyandu }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->nama_bayi }}</td>
                                            <td>{{ $data->berat_badan }}</td>
                                            <td>{{ $data->tinggi_badan }}</td>
                                            <td>
                                                @if ($data->lingkar_kepala == NULL)
                                                    -
                                                @else
                                                    {{ $data->lingkar_kepala }}
                                                @endif
                                            </td>
                                            <td>{{ $data->status_gizi }}</td>
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