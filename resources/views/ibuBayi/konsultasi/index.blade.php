<head>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style1.css">
</head>
@extends('layout.master')
@section('konten')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">KONSULTASI ONLINE</h1>
        <!-- DataTales Example -->
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        @php
            $id = Auth::id();
        @endphp
        <div class="card-body">
            <div class="card" style="width: 50rem; background: #A7C0EA; color: black;">
                <div class="card-body">
                    <h4 class="card-title"> Anda bisa memulai konsultasi online mengenai perkembangan gizi bayi/balita
                        Anda.</h4>
                </div>
                <div class="col card-header text-left" style="background: #A7C0EA;">
                    <a href="{{ url('konsultasiIbu/createKonsultasi/'. $id  ) }}" class="btn btn-primary" style="background: #F08080;"><i class="fas fa-comment"></i> Mulai Konsultasi </a>
                </div>
            </div>
        </div>
        {{-- Riwayat konsultasi --}}
        <h1 class="h3 mb-2 text-gray-800">Riwayat Konsultasi</h1>
        <div class="accordion" id="accordionExample">
            @foreach ($konsultasi as $key => $data)
                @if ($data->user->id == Auth::user()->id)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                <span>{{ $data->konsul }}</span>
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body"><strong>SOLUSI : 
                                @if ($data->solusi == NULL)
                                    (belum ada tanggapan)
                                @else
                                    {{ $data->solusi }}
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
    </div>
    <!-- /.container-fluid -->
    <!-- End of Main Content -->
    <div class="modal fade" id="pesan" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>FORM KONSULTASI ONLINE</h3>
                </div>
                <div class="modal-body">
                    <form role="form" action="{{ route('storeKonsultasi') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_ibu"><strong>Nama Ibu</strong></label></br>
                                <input type="text" class="form-control" id="nama_ibu" name="nama_ibu"
                                    placeholder="Masukkan Nama Ibu Bayi/Balita">
                            </div>
                            <div class="form-group">
                                <label for="konsul"><strong>Konsul<strong></label><br>
                                <textarea name="konsul" id="konsul" class="form-control" rows="5" placeholder="Masukkan Konsultasi"
                                    required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary mr-1">Submit</button>
                            <button class="btn btn-primary mr-1" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>
    <!-- End of Main Content -->
@endsection