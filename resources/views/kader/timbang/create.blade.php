@extends('layout.master')
@section('konten')
    <!-- Content Header (Page header) -->
    <section>
        <div class="container ">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <br>
                            <h2 class="m-0 text-dark"><strong>Tambah Timbang Bayi/Balita</strong></h2></br>
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
                                <form role="form" action="{{ route('storeTimbang') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @php
                                        $id = Auth::id();
                                    @endphp
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <input type="hidden" name="id_bb" value="{{ $bayiBalita->id_bb }}">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="tgl_timbang"><strong>Tanggal Timbang<strong></label><br>
                                            <input type="date" class="form-control" name="tgl_timbang" id="datepicker"
                                                placeholder="Masukkan Tanggal Timbang">
                                        </div>
                                        <div class="form-group">
                                            <label for="berat_badan"><strong>Berat Badan<strong></label><br>
                                            <input type="text" class="form-control" id="berat_badan" name="berat_badan"
                                                placeholder="Masukkan Berat Badan" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="tinggi_badan"><strong>Tinggi Badan<strong></label><br>
                                            <input type="text" class="form-control" id="tinggi_badan" name="tinggi_badan"
                                                placeholder="Masukkan Tinggi Badan">
                                        </div>
                                        <div class="form-group">
                                            <label for="lingkar_kepala"><strong>Lingkar Kepala<strong></label><br>
                                            <input type="text" class="form-control" id="lingkar_kepala"
                                                name="lingkar_kepala" placeholder="Masukkan lingkar Kepala">
                                        </div>
                                        <!-- <div class="form-group">
                                            <label for="status_gizi"><strong>Status Gizi<strong></label><br>
                                            <select class="form-control select2bs4" name="status_gizi" id="status_gizi"
                                                style="width: 100%;" required></br>
                                                <option value="Baik">Baik</option>
                                                <option value="BGM">BGM</option>
                                            </select>
                                        </div> -->
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary mr-1">Submit</button>
                                        <a href=""
                                            class="btn btn-default">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
        </div>
        </div>
    @endsection
