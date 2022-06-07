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
            <h2 class="m-0 text-dark"><strong>Edit Bayi Balita </strong></h2></br>
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
                <form role="form" action="{{ route('updateBB', $bayiBalita->id_bb) }}" method="POST">
                    @csrf
                    <div class="card-body">
                      <input type="hidden" name="id_bb" value="{{ $bayiBalita->id_bb }}"> <br/>
                      <div class="form-group">
                        <label for="nama_bayi"><strong>Nama Bayi</strong></label></br>
                        <input type="text" class="form-control" id="nama_bayi" name="nama_bayi" value="{{ $bayiBalita->nama_bayi }}">
                      </div>
                      <div class="form-group">
                        <label for="tgl_lahir"><strong>Tanggal Lahir<strong></label><br>
                        <input type="date" class="form-control" name="tgl_lahir" id="datepicker"  value="{{ $bayiBalita->tgl_lahir }}">
                      </div>
                      <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <div class="d-flex">
                            <div class="custom-control custom-radio mr-3">
                                <input class="custom-control-input" type="radio" id="laki-laki" name="jenis_kelamin" value="Laki-laki" {{ $bayiBalita->jk == 'Laki-laki' ? 'checked' : ''}}>
                                <label for="laki-laki" class="custom-control-label">Laki - Laki</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan" {{ $bayiBalita->jk == 'Perempuan' ? 'checked' : ''}}>
                                <label for="perempuan" class="custom-control-label">Perempuan</label>
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="tempat_lahir"><strong>Tempat Lahir<strong></label><br>
                          <textarea name="tempat_lahir" id="tempat_lahir" class="form-control"  value="{{ $bayiBalita->tempat_lahir }}">{{ $bayiBalita->tempat_lahir }}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="nama_ibu"><strong>Nama Ibu</strong></label></br>
                        <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="{{ $bayiBalita->nama_ibu }}">
                      </div>
                      <div class="form-group">
                        <label for="nama_ayah"><strong>Nama Ayah</strong></label></br>
                        <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="{{ $bayiBalita->nama_ayah }}">
                      </div>
                      <div class="form-group">
                        <label for="akun"><strong>Akun Ibu</strong></label>
                        <select class="form-control select2bs4" name="akun" id="akun" style="width: 100%;" required><br>
                          @foreach ($user as $item)
                            <option value="{{ $item->id }}" {{ $bayiBalita->id == $item->id ? 'selected' : '' }}>{{ $item->nik }} - {{ $item->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary mr-1">Submit</button>
                      <a href="{{ route('timbangbayiBalita') }}" class="btn btn-default">Cancel</a>
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