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
            <h2 class="m-0 text-dark"><strong>Edit Timbang Bayi/Balita</strong></h2></br>
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
                <form role="form" action="{{ route('updateTimbang', $timbang->id_timbang) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @php
                      $id = Auth::id();
                    @endphp       
                    <div class="card-body">
                      <div class="form-group">
                        <label for="id_timbang"><strong>ID Timbang<strong></label><br>
                        <input type="text" class="form-control" id="id_timbang" name="id_timbang" value="{{ $timbang->id_timbang }}" disabled>
                      </div>
                      <input type="hidden" name="id" value="{{ $id }}">
                      <div class="form-group">
                        <label for="id_bb"><strong>Nama Bayi/Balita</strong></label>
                        <select class="form-control select2bs4" name="id_bb" id="id_bb" style="width: 100%;" ><br>
                          @foreach ($bayiBalita as $item)
                          <option value="{{ $item->id_bb }}" {{ $timbang->id_bb == $item->id_bb ? 'selected' : '' }}>{{ $item->nama_bayi }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="tgl_timbang"><strong>Tanggal Timbang<strong></label><br>
                          <input type="date" class="form-control" name="tgl_timbang" id="datepicker" value="{{ $timbang->tgl_timbang}}">
                      </div>
                      <div class="form-group">
                        <label for="berat_badan"><strong>Berat Badan<strong></label><br>
                        <input type="text" class="form-control" id="berat_badan" name="berat_badan" value="{{ $timbang->berat_badan }}" >
                      </div>
                      <div class="form-group">
                        <label for="tinggi_badan"><strong>Tinggi Badan<strong></label><br>
                        <input type="text" class="form-control" id="tinggi_badan" name="tinggi_badan" value="{{ $timbang->tinggi_badan }}" >
                      </div>
                      <div class="form-group">
                        <label for="lingkar_kepala"><strong>Lingkar Kepala<strong></label><br>
                        <input type="text" class="form-control" id="lingkar_kepala" name="lingkar_kepala" value="{{ $timbang->lingkar_kepala }}" >
                      </div>
                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary mr-1">Submit</button>
                      <a href="{{ route('detailTimbangBayi', $timbang->id_bb) }}" class="btn btn-default">Cancel</a>
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