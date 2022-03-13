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
            <h2 class="m-0 text-dark"><strong>Edit Jadwal Posyandu </strong></h2></br>
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
                <form role="form" action="{{ route('updateVitaminA', $vitaminA->id_vitaminA) }}" method="POST">
                    @csrf
                    <div class="card-body">
                      <input type="hidden" name="vitaminA" value="{{ $vitaminA->id_vitaminA }}"> <br/>
                      <div class="form-group">
                        <label for="bayi"><strong>Nama Bayi/Balita</strong></label>
                        <select class="form-control select2bs4" name="bayi" id="bayi" style="width: 100%;" required><br>
                          @foreach ($bayiBalita as $item)
                            <option value="{{ $item->id_bb }}" {{ $vitaminA->id_bb == $item->id_bb? 'selected' : '' }}>{{ $item->nama_bayi }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="kapsul_vitaminA"><strong>Kapsul VitaminA<strong></label>
                        <input type="text" class="form-control" id="kapsul_vitaminA" name="kapsul_vitaminA" value="{{ $vitaminA->kapsul_vitaminA}}">
                      </div>
                      <div class="form-group">
                        <label for="tanggal_beri_vitaminA"><strong>Tanggal Beri VitaminA<strong></label><br>
                        <input type="date" class="form-control"  name="tanggal_beri_vitaminA" id="datepicker" value="{{ $vitaminA->tanggal_beri_vitaminA}}">
                      </div>
                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary mr-1">Submit</button>
                      <a href="{{ route('imunisasiDanvitaminA') }}" class="btn btn-default">Cancel</a>
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