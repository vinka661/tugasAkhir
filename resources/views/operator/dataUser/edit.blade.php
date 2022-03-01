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
                            <h2 class="m-0 text-dark"><strong>Edit Data User </strong></h2></br>
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
                                <form role="form" action="{{ route('updateDataUser', $dataUser->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <input type="hidden" name="id" value="{{ $dataUser->id }}"> <br />
                                        {{-- <div class="form-group">
                                          <label for="posyandu"><strong>Posyandu</strong></label>
                                          <select class="form-control select2bs4" name="posyandu" id="posyandu" style="width: 100%;">
                                            @foreach ($posyandu as $item)
                                              <option value="">{{ $item->nama_posyandu }}</option>
                                            @endforeach
                                          </select>
                                        </div> --}}
                                        <div class="form-group">
                                          <label for="posyandu"><strong>Posyandu</strong></label>
                                          <select class="form-control select2bs4" name="posyandu" id="posyandu"
                                              style="width: 100%;" required><br>
                                              @foreach ($posyandu as $item)
                                                  <option value="{{ $item->id_posyandu }}">{{ $item->nama_posyandu }}
                                                  </option>
                                              @endforeach
                                          </select>
                                      </div>
                                        <div class="form-group">
                                            <label for="nama"><strong>Nama User</strong></label></br>
                                            <input type="text" class="form-control" id="nama" name="nama"
                                                value="{{ $dataUser->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="email"><strong>Email<strong></label><br>
                                            <input type="text" class="form-control" id="email" name="email"
                                                value="{{ $dataUser->email }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="password"><strong>Password<strong></label><br>
                                            <input type="password" class="form-control" id="password" name="password"
                                                value="{{ $dataUser->password }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="role">Role</label>
                                            <div class="d-flex">
                                                <div class="custom-control custom-radio mr-3">
                                                    <input class="custom-control-input" type="radio" id="Kader" name="role"
                                                        value="Kader" {{ $dataUser->role == 'Kader' ? 'checked' : '' }}>
                                                    <label for="Kader" class="custom-control-label">Kader</label>
                                                </div>
                                                <div class="custom-control custom-radio mr-3">
                                                    <input class="custom-control-input" type="radio" id="Bidan Desa" name="role"
                                                        value="Bidan Desa" {{ $dataUser->role == 'Bidan Desa' ? 'checked' : '' }}>
                                                    <label for="Bidan Desa" class="custom-control-label">Bidan Desa</label>
                                                </div>
                                                <div class="custom-control custom-radio mr-3">
                                                    <input class="custom-control-input" type="radio" id="Orang Tua Bayi/Balita" name="role"
                                                        value="Orang Tua Bayi/Balita" {{ $dataUser->role == 'Orang Tua Bayi/Balita' ? 'checked' : '' }}>
                                                    <label for="Orang Tua Bayi/Balita" class="custom-control-label">Orang Tua Bayi/Balita</label>
                                                </div>
                                            </div>
                                        </div>
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="photo"><strong>Photo</strong></label>
                                            <input type="file" class="form-control" name="photo"
                                                value="{{ $dataUser->photo }}"></br>
                                            <img width="150px" src="{{ asset('storage/' . $dataUser->photo) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat"><strong>Alamat<strong></label><br>
                                            <textarea name="alamat" id="alamat" class="form-control"
                                                value="{{ $dataUser->alamat }}">{{ $dataUser->alamat }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <div class="d-flex">
                                                <div class="custom-control custom-radio mr-3">
                                                    <input class="custom-control-input" type="radio" id="laki-laki"
                                                        name="jenis_kelamin" value="Laki-laki"
                                                        {{ $dataUser->jenis_kelamin == 'Laki-laki' ? 'checked' : '' }}>
                                                    <label for="laki-laki" class="custom-control-label">Laki - Laki</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" type="radio" id="perempuan"
                                                        name="jenis_kelamin" value="Perempuan"
                                                        {{ $dataUser->jenis_kelamin == 'Perempuan' ? 'checked' : '' }}>
                                                    <label for="perempuan" class="custom-control-label">Perempuan</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary mr-1">Submit</button>
                                        <a href="{{ route('dataUser') }}" class="btn btn-default">Cancel</a>
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
