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
            <h2 class="m-0 text-dark"><strong>Edit Bidan Desa</strong></h2></br>
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
                <form role="form" action="{{ route('updateBidan', $bidan->id) }}" method="POST">
                    @csrf
                    <div class="card-body">
                      <input type="hidden" name="id" value="{{ $bidan->id }}"> <br/>
                      <div class="form-group">
                        <label for="name"><strong>Nama User</strong></label></br>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $bidan->name }}">
                      </div>
                      <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <div class="d-flex">
                            <div class="custom-control custom-radio mr-3">
                            <input class="custom-control-input" type="radio" id="laki-laki" name="jenis_kelamin" value="Laki-laki" {{ $bidan->jenis_kelamin == 'Laki-laki' ? 'checked' : ''}}>
                            <label for="laki-laki" class="custom-control-label">Laki - Laki</label>
                            </div>
                            <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan" {{ $bidan->jenis_kelamin == 'Perempuan' ? 'checked' : ''}}>
                            <label for="perempuan" class="custom-control-label">Perempuan</label>
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="alamat"><strong>Alamat<strong></label><br>
                          <textarea name="alamat" id="alamat" class="form-control"  value="{{ $bidan->alamat }}">{{ $bidan->alamat }}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="posyandu"><strong>Posyandu</strong></label>
                        <select class="form-control select2bs4" name="posyandu" id="posyandu" style="width: 100%;" required><br>
                        @foreach ($posyandu as $item)
                            <option value="{{ $item->id_posyandu }}" {{ $bidan->id_posyandu == $item->id_posyandu ? 'selected' : '' }}>{{ $item->nama_posyandu }}</option>
                        @endforeach
                        </select>
                      </div>
                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary mr-1">Submit</button>
                      <a href="{{ route('bidan') }}" class="btn btn-default">Cancel</a>
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