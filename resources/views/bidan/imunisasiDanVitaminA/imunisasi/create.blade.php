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
            <h2 class="m-0 text-dark"><strong>Tambah Data Imunisasi Baru</strong></h2></br>
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
              <form role="form" action="{{ route('storeImunisasi') }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="bayi"><strong>Nama Bayi/Balita</strong></label>
                    <select class="form-control select2bs4" name="bayi" id="bayi" style="width: 100%;" required><br>
                      @foreach ($bayiBalita as $item)
                        <option value="{{ $item->id_bb }}">{{ $item->nama_bayi }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="imunisasi"><strong>Jenis Vaksin Imunisasi</strong></label>
                    <select class="form-control select2bs4" name="imunisasi" id="imunisasi" style="width: 100%;" required><br>
                      @foreach ($jenisVaksinImunisasi as $item)
                        <option value="{{ $item->id_vaksin_imunisasi }}">{{ $item->nama_vaksin }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="tanggal_beri_imunisasi"><strong>Tanggal Beri VitaminA<strong></label><br>
                    <input type="date" class="form-control"  name="tanggal_beri_imunisasi" id="datepicker" placeholder="Masukkan Tanggal Vaksin">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary mr-1">Submit</button>
                  <a href="{{ route('imunisasiDanvitaminA') }}" class="btn btn-default">Cancel</a>
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