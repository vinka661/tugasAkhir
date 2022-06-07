@extends('layout.master')
@section('konten')
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <div class="mt-3">
                                    <h4>Photo</h4>
                                </div>

                                @if (Auth::user()->photo == null)
                                    <img src="{{ url('../assets/dist/img/avatar6.png') }}" alt="Admin"
                                        class="rounded-circle p-1 bg-primary" width="170">
                                @else
                                    <img src="{{ Auth::user()->photo }}" alt="Admin"
                                        class="rounded-circle p-1 bg-primary" width="170">
                                @endif

                                <br><label>Ganti Foto</label>

                            </div>
                            <form enctype="multipart/form-data" action="/edit-profil" method="POST">

                                <input type="file" name="avatar">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="col  text-right">
                                    <input type="submit" value="Simpan" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                        @foreach($namabayi as $key => $data)
                            @if ($data->user->id == Auth::user()->id)
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Nama Bayi</h6>
                                    </div>
                                    <dd class="col-sm-8">{{ $data->nama_bayi }}</dd>
                                </div>
                            @endif
                        @endforeach
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Name Lengkap</h6>
                            </div>
                            <dd class="col-sm-8">{{ $user->name }}</dd>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Jenis Kelamin</h6>
                            </div>
                            <dd class="col-sm-8">
                                @if ($user->jenis_kelamin == 'Laki-laki')
                                    Laki - Laki
                                @elseif($user->jenis_kelamin == 'Perempuan')
                                    Perempuan
                                @else
                                    -
                                @endif
                            </dd>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <dd class="col-sm-8">{{ $user->email }}</dd>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Alamat</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <dd class="col-sm-8">
                                    @if ($user->alamat == NULL)
                                        -
                                    @else
                                        {{ $user->alamat }}
                                    @endif
                                </dd>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Nama Posyandu</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <dd class="col-sm-8">
                                    {{ !empty($user->posyandu) ? $user->posyandu->nama_posyandu:'' }}
                                </dd>
                            </div>
                        </div>
                        <div class="col  text-right">
                            <a href="{{ route('userIbu.profile.edit', Auth::user()->id) }}"
                                class="btn btn-primary">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
