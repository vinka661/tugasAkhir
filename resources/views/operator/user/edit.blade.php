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
            <h2 class="m-0 text-dark"><strong>Edit User </strong></h2></br>
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
                <form role="form" action="{{ route('updateUser', $user->id) }}" method="POST">
                    @csrf
                    <div class="card-body">
                      <input type="hidden" name="id" value="{{ $user->id }}"> <br/>
                      <div class="form-group">
                        <label for="namae"><strong>Nama User</strong></label></br>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                      </div>
                      <div class="form-group">
                        <label for="email"><strong>Email</strong></label></br>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                      </div>
                      <div class="form-group">
                        <label for="password"><strong>Password</strong></label></br>
                        <input type="password" class="form-control" id="password" name="password" value="{{ $user->password }}">
                      </div>
                      <div class="form-group">
                        <label for="role"><strong>Role<strong></label><br>
                        <select class="form-control select2bs4" name="role" id="role" style="width: 100%;" required></br>
                          <option value="Operator PLKB" {{ $user->role == 'Operator PLKB' ? 'selected' : '' }}>Operator PLKB</option>
                          <option value="Kepala PLKB" {{ $user->role == 'Kepala PLKB' ? 'selected' : '' }}>Kepala PLKB</option>
                          <option value="Bidan Desa" {{ $user->role == 'Bidan Desa' ? 'selected' : '' }}>Bidan Desa</option>
                          <option value="Kader" {{ $user->role == 'Kader' ? 'selected' : '' }}>Kader</option>
                          <option value="Ibu Bayi" {{ $user->role == 'Ibu Bayi' ? 'selected' : '' }}>Ibu Bayi/Balita</option>
                        </select>
                      </div>
                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary mr-1">Submit</button>
                      <a href="{{ route('user') }}" class="btn btn-default">Cancel</a>
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