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
              <form role="form" action="{{ route('storeBB') }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama_bayi"><strong>Nama<strong></label>
                    <input type="text" class="form-control" id="nama_bayi" name="nama_bayi" placeholder="Masukkan Nama Bayi/Balita" required>
                  </div>
                  <div class="form-group">
                    <label for="tgl_lahir"><strong>Tanggal Lahir<strong></label><br>
                    <input type="date" class="form-control"  name="tgl_lahir" id="datepicker" placeholder="Masukkan Tanggal Lahir">
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
                  <!-- <div class="form-group">
                    <label for="umur">Umur (bln)</label>
                    <input type="number" class="form-control" id="umur" name="umur" placeholder="Masukkan Umur (bln)">
                  </div> -->
                  <div class="form-group">
                    <label for="tempat_lahir"><strong>Tempat Lahir<strong></label><br>
                    <textarea name="tempat_lahir" id="tempat_lahir" class="form-control" rows="5" placeholder="Masukkan Tempat Lahir Bayi/Balita" required></textarea>
                  </div>
                  <div class="form-group">
                    <label for="akun"><strong>Akun Ibu</strong></label>
                    <select class="form-control select2bs4" name="akun" id="akun_id" style="width: 100%;" required><br>
                      @foreach ($user as $item)
                        <option value="{{ $item->id }}">{{ $item->nik }} - {{ $item->name }}</option>
                     @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="nama_ibu"><strong>Nama Ibu<strong></label>
                    <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" placeholder="Masukkan Nama Ibu" required readonly>
                  </div>
                  <div class="form-group">
                    <label for="nama_ayah"><strong>Nama Ayah<strong></label>
                    <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" placeholder="Masukkan Nama Ayah" required>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary mr-1">Submit</button>
                  <a href="{{ route('timbangbayiBalita') }}" class="btn btn-default">Cancel</a>
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