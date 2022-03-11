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
            <h2 class="m-0 text-dark"><strong>Tambah Jadwal Penyuluhan Baru</strong></h2></br>
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
              <form role="form" action="{{ route('storeJadwalPosyandu') }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="posyandu"><strong>Nama Posyandu</strong></label>
                    <select class="form-control select2bs4" name="posyandu" id="posyandu" style="width: 100%;" required><br>
                      @foreach ($posyandu as $item)
                        <option value="{{ $item->id_posyandu }}">{{ $item->nama_posyandu }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="hari"><strong>Hari<strong></label>
                    <input type="text" class="form-control" id="hari" name="hari" placeholder="Masukkan Hari Jadwal Posyandu" required>
                  </div>
                  <div class="form-group">
                    <label for="jam"><strong>Jam<strong></label>
                    <input type="time" class="form-control" id="jam" name="jam" placeholder="Masukkan jam Jadwal Posyandu" required>
                  </div>
                  <div class="form-group">
                    <label for="tanggal"><strong>Tanggal<strong></label><br>
                    <input type="date" class="form-control"  name="tanggal" id="datepicker" placeholder="Masukkan Jadwal Posyandu">
                  </div>
                  <div class="form-group">
                    <label for="agenda"><strong>Agenda<strong></label><br>
                    <textarea name="agenda" id="agenda" class="form-control" rows="5" placeholder="Masukkan Agenda Jadwal Posyandu" required></textarea>
                  </div>
                  <div class="form-group">
                    <label for="tempat"><strong>Tempat<strong></label>
                    <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Masukkan Tempat Jadwal Posyandu" required>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary mr-1">Submit</button>
                  <a href="{{ route('jadwalPosyandu') }}" class="btn btn-default">Cancel</a>
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