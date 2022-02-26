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
            <h2 class="m-0 text-dark"><strong>Tambah Bayi Balita Baru</strong></h2></br>
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
              <form role="form" action="{{ route('storeBayiBalita') }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama_bayi"><strong>Nama<strong></label>
                    <input type="text" class="form-control" id="nama_bayi" name="nama_bayi" placeholder="Masukkan Nama Bayi/Balita" required>
                  </div>
                  <div class="form-group">
                    <label for="ttl"><strong>TTL<strong></label><br>
                    <input type="date" class="form-control"  name="ttl" id="datepicker" placeholder="Masukkan TTL">
                  </div>
                  <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <div class="d-flex">
                        <div class="custom-control custom-radio mr-3">
                          <input class="custom-control-input" type="radio" id="laki-laki" name="jenis_kelamin" value="Laki-laki" required>
                          <label for="laki-laki" class="custom-control-label">Laki - Laki</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan" required>
                          <label for="perempuan" class="custom-control-label">Perempuan</label>
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="umur">Umur (bln)</label>
                    <input type="number" class="form-control" id="umur" name="umur" placeholder="Masukkan Umur (bln)" required>
                  </div>
                  <div class="form-group">
                    <label for="alamat"><strong>Alamat<strong></label><br>
                    <textarea name="alamat" id="alamat" class="form-control" rows="5" required></textarea>
                  </div>
                  <div class="form-group">
                    <label for="nama_ibu"><strong>Nama Ibu<strong></label>
                    <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" placeholder="Masukkan Nama Ibu" required>
                  </div>
                  <div class="form-group">
                    <label for="nama_ayah"><strong>Nama Ayah<strong></label>
                    <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" placeholder="Masukkan Nama Ayah" required>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary mr-1">Submit</button>
                  <a href="{{ route('bayiBalita') }}" class="btn btn-default">Cancel</a>
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