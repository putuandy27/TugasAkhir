@extends('layout.main')

@section('title', 'Form Buku')

@section('container')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>General Form</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item"><a href=" {{ url('/role') }} ">Role Tables</a></li>
              <li class="breadcrumb-item active">Edit</li>
            </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Role</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="/admin/role/{{ $role->id }}" method="POST">
              @csrf
              @method('patch')
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Id Role</label>
                  <input type="text" class="form-control" readonly value=" {{ $role->id }} " name="id">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Role</label>
                  <input type="text" class="form-control" value=" {{ $role->name }} " id="name" placeholder="Nama role" name="name">
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-success">Update</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
      </div>
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection