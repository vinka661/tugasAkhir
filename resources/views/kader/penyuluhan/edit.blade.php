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
            <h2 class="m-0 text-dark"><strong>Edit Jadwal Penyuluhan </strong></h2></br>
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
                <form role="form" action="{{ route('updatePenyuluhan', $penyuluhan->id_penyuluhan) }}" method="POST">
                    @csrf
                    <div class="card-body">
                      <input type="hidden" name="id_penyuluhan" value="{{ $penyuluhan->id_penyuluhan }}"> <br/>
                      <div class="form-group">
                        <label for="kader"><strong>Nama Kader</strong></label>
                        <select class="form-control select2bs4" name="kader" id="kader" style="width: 100%;" required><br>
                        @foreach ($kader as $item)
                            <option value="{{ $item->id }}" {{ $penyuluhan->id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                        @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="hari"><strong>Hari</strong></label></br>
                        <input type="text" class="form-control" id="hari" name="hari" value="{{ $penyuluhan->hari }}">
                      </div>
                      <div class="form-group">
                        <label for="tanggal"><strong>Tanggal<strong></label><br>
                        <input type="date" class="form-control" name="tanggal" id="datepicker"  value="{{ $penyuluhan->tanggal }}">
                      </div>
                      <div class="form-group">
                        <label for="materi"><strong>Materi Penyuluhan<strong></label><br>
                          <textarea name="materi" id="materi" class="form-control"  value="{{ $penyuluhan->materi }}">{{ $penyuluhan->materi }}</textarea>
                      </div>
                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary mr-1">Submit</button>
                      <a href="{{ route('penyuluhan') }}" class="btn btn-default">Cancel</a>
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