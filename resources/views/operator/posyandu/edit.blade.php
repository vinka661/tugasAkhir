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
            <h2 class="m-0 text-dark"><strong>Edit Posyandu </strong></h2></br>
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
                <form role="form" action="{{ route('updatePosyandu', $posyandu->id_posyandu) }}" method="POST">
                    @csrf
                    <div class="card-body">
                      <input type="hidden" name="id_posyandu" value="{{ $posyandu->id_posyandu }}"> <br/>
                      <div class="form-group">
                        <label for="nama_posyandu"><strong>Nama Posyandu</strong></label></br>
                        <input type="text" class="form-control" id="nama_posyandu" name="nama_posyandu" value="{{ $posyandu->nama_posyandu }}">
                      </div>
                      <div class="form-group">
                        <label for="alamat"><strong>Alamat<strong></label><br>
                          <textarea name="alamat" id="alamat" class="form-control"  value="{{ $posyandu->alamat }}">{{ $posyandu->alamat }}</textarea>
                      </div>
                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary mr-1">Submit</button>
                      <a href="{{ route('posyandu') }}" class="btn btn-default">Cancel</a>
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