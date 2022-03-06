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
            <h2 class="m-0 text-dark"><strong>Tambah User Baru</strong></h2></br>
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
              <form role="form" action="{{ route('storeUser') }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name"><strong>Nama User<strong></label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama User" required>
                  </div>
                  <div class="form-group">
                    <label for="email"><strong>Email<strong></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Nama Email" required>
                  </div>
                  <div class="form-group">
                    <label for="password"><strong>Password<strong></label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
                  </div>
                  <div class="form-group">
                    <label for="role"><strong>Role<strong></label><br>
                    <select class="form-control select2bs4" name="role" id="role" style="width: 100%;" required></br>
                      <option value="Operator PLKB">Operator PLKB</option>
                      <option value="Kepala PLKB">Kepala PLKB</option>
                      <option value="Bidan Desa">Bidan Desa</option>
                      <option value="Kader">Kader</option>
                      <option value="Ibu Bayi">Ibu Bayi/Balita</option>
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary mr-1">Submit</button>
                  <a href="{{ route('user') }}" class="btn btn-default">Cancel</a>
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