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
                        <div class="card-body">
                            <div class="card" style="width: 50rem; background: #A7C0EA; color: black;">
                                <div class="card-body">
                                  <h4 class="card-title"> Anda bisa memulai konsultasi online mengenai perkembangan gizi bayi/balita Anda.</h4>
                                </div>
                                <div class="col card-header text-left" style="background: #A7C0EA;">
                                    <a href="#pesan" data-toggle="modal" class="btn btn-primary" style="background: #F08080;"><i class="fas fa-comment"></i> Mulai Konsultasi </a>
                                </div>
                            </div>
                        </div>
                </div>
                <!-- /.container-fluid -->

            </div>
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
                                            <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" placeholder="Masukkan Nama Ibu Bayi/Balita">
                                        </div>
                                        <div class="form-group">
                                            <label for="konsul"><strong>Konsul<strong></label><br>
                                            <textarea name="konsul" id="konsul" class="form-control" rows="5" placeholder="Masukkan Konsultasi" required></textarea>
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