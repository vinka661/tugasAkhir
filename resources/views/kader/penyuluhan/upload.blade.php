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
            <h2 class="m-0 text-dark"><strong>Upload Materi Penyuluhan </strong></h2></br>
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
                <form role="form" action="{{ route('uploadVideo', $penyuluhan->id_penyuluhan) }}" method="POST">
                    @csrf
                    <div class="card-body">
                      <input type="hidden" name="id_penyuluhan" value="{{ $penyuluhan->id_penyuluhan }}"> <br/>
                      <div class="form-group">
                        <label for="video"><strong>Video<strong></label><br>
                        <textarea name="video" id="video" class="form-control" rows="5" placeholder="Masukkan Link Video Materi Penyuluhan" required></textarea>
                      </div>
                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary mr-1">Submit</button>
                      <a href="{{ route('penyuluhanKader') }}" class="btn btn-default">Cancel</a>
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