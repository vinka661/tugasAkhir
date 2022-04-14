@extends('layout.master')
@section('konten')
  @php
  $id = str_replace('@mail.com', '', Auth::user()->email);;
  @endphp
  <div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <form role="form" action="{{ route('updateDataKepala', $kepala->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                <input type="text" class="form-control" id="id" name="id" value="{{ $kepala->id }}" hidden>
                  <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" value="{{ $kepala->name }}">
                  </div>
                  <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <div class="d-flex">
                            <div class="custom-control custom-radio mr-3">
                                <input class="custom-control-input" type="radio" id="laki-laki" name="jenis_kelamin" value="Laki-laki" {{ $kepala->jenis_kelamin == 'Laki-laki' ? 'checked' : ''}}>
                                <label for="laki-laki" class="custom-control-label">Laki - Laki</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan" {{ $kepala->jenis_kelamin == 'Perempuan' ? 'checked' : ''}}>
                                <label for="perempuan" class="custom-control-label">Perempuan</label>
                            </div>
                        </div>
                      </div>
                  <div class="form-group">
                      <label for="alamat">Alamat</label>
                      <textarea class="form-control" name="alamat" id="alamat" rows="3">{{ $kepala->alamat }}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="photo">Foto</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="photo" id="customFile" >
                        <input type="hidden" class="custom-file-input" name="old_photo" id="customFile" value="{{ Auth::user()->photo }}">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary mr-1">Submit</button>
                  <a href="{{ route('dataKepala', $id) }}" class="btn btn-default">Cancel</a>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection