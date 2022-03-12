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
            <h2 class="m-0 text-dark"><strong>Edit Data Jenis Vaksin Imunisasi </strong></h2></br>
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
                <form role="form" action="{{ route('updateJenisVaksinImunisasi', $jenisVaksinImunisasi->id_vaksin_imunisasi) }}" method="POST">
                    @csrf
                    <div class="card-body">
                      <input type="hidden" name="id_vaksin_imunisasi" value="{{ $jenisVaksinImunisasi->id_vaksin_imunisasi }}"> <br/>
                      <div class="form-group">
                        <label for="nama_vaksin"><strong>Nama Jenis Vaksin Imunisasi</strong></label></br>
                        <input type="text" class="form-control" id="nama_vaksin" name="nama_vaksin" value="{{ $jenisVaksinImunisasi->nama_vaksin }}">
                      </div>
                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary mr-1">Submit</button>
                      <a href="{{ route('jenisVaksinImunisasi') }}" class="btn btn-default">Cancel</a>
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