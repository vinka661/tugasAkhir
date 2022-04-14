@extends('layout.master')
@section('konten')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Diri</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
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
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-2">
                    @if (Auth::user()->photo == null)
                      <img class="img-circle elevation-2" src="{{ url('../img/user2-160x160.jpg') }}" width="150px" height="150px" alt="User Avatar">  
                    @else
                      <img class="img-circle elevation-2" src="{{Auth::user()->photo}}" width="150px" height="150px" alt="User Avatar">
                    @endif
                  </div>
                  <div class="col-lg-10">
                    <dl class="row">
                      <dt class="col-sm-4">Nama Lengkap</dt>
                      <dd class="col-sm-8">{{ $kepala->name }}</dd>
                      <dt class="col-sm-4">Jenis Kelamin</dt>
                      <dd class="col-sm-8">                    
                        @if ($kepala->jenis_kelamin == 'L')
                            Laki - Laki
                        @else
                            Perempuan
                        @endif
                      </dd>
                      <dt class="col-sm-4">Alamat</dt>
                        <dd class="col-sm-8">{{ $kepala->alamat }}</dd>
                      </dl>
                  </div>
                </div>
                <div class="col  text-right">
                <a href="{{ route('editDataKepala', $kepala->id) }}" class="btn btn-primary">Edit</a>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection