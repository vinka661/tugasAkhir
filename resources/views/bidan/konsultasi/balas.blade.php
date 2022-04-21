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
            <h2 class="m-0 text-dark"><strong>Balas Konsultasi </strong></h2></br>
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
                <form role="form" action="{{ route('updateKonsultasi', $konsultasi->id_kosultasi) }}" method="POST">
                    @csrf
                     <div class="card-body">
                      <input type="hidden" name="imunisasi" value="{{ $konsultasi->id_kosultasi }}"> <br/>
                      <div class="form-group">
                        <label for="bayi"><strong>Nama Ibu</strong></label>
                        <input type="text" class="form-control" id="ibu" name="ibu" value="{{ $konsultasi->user->name }}" disabled>
                      </div>
                      <div class="form-group">
                        <label for="konsul">Konsul Permasalahan</label>
                        <textarea class="form-control" name="konsul" id="konsul" rows="3" disabled>{{ $konsultasi->konsul }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="solusi">Solusi</label>
                        <textarea class="form-control" name="solusi" id="solusi" rows="3" >{{ $konsultasi->solusi }}</textarea>
                    </div> 
                      
                      
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary mr-1">Submit</button>
                      <a href="{{ route('konsultasi') }}" class="btn btn-default">Cancel</a>
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