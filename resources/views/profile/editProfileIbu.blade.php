@extends('layout.master')
@section('konten')
    @php
    $id = str_replace('@gmail.com', '', Auth::user()->email);
    @endphp
    <div class="content-wrapper">
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary card-outline">
                            <form action="{{ route('userIbu.profile.update', $user->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <input type="text" class="form-control" id="id" name="id" value="{{ $user->id }}"
                                        hidden>
                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Nama Lengkap" value="{{ $user->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <div class="d-flex">
                                            <div class="custom-control custom-radio mr-3">
                                                <input class="custom-control-input" type="radio" id="laki-laki"
                                                    name="jenis_kelamin" value="Laki-laki"
                                                    {{ $user->jenis_kelamin == 'Laki-laki' ? 'checked' : '' }}>
                                                <label for="laki-laki" class="custom-control-label">Laki - Laki</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" id="perempuan"
                                                    name="jenis_kelamin" value="Perempuan"
                                                    {{ $user->jenis_kelamin == 'Perempuan' ? 'checked' : '' }}>
                                                <label for="perempuan" class="custom-control-label">Perempuan</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control" name="alamat" id="alamat" rows="3">{{ $user->alamat }}</textarea>
                                    </div>
                                </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary mr-1">Submit</button>
                            <a href="{{ route('userIbu.profile', Auth::user()->id) }}" class="btn btn-default">Cancel</a>
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
