@extends('layouts.admin')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Add gallary</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('gallary.all')}}">Gallaries</a></li>
              <li class="breadcrumb-item active">Add gallary</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
	<form action="{{route('gallary.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
      <div class="row">
        <div class="col-md-12">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Details</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                  <label>Type gallary</label>
                  <select class="form-control select2 type_gallary" name="type_gallary" style="width: 100%;">
                    <option value="image" selected="selected">Image</option>
                    <option value="video">Video</option>
                  </select>
                </div>
                <div class="img"><a class=""><img src="" alt=""></a></div>
                <div class="form-group row image" >
                    <div class="dropzone col mt-2">
                    <div><i class="fas fa-plus"></i> <span>Media</span></div>
                    <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <div class="col mt-2 ">
                    <a href="#" class="btn btn-success w-100 pt-1 delete_file"><i class="fas fa-times"></i> <span>Delete</span></a>
                    </div>
                </div>
                <div class="form-group video">
                    <label for="inputStatus">Url</label>
                    <input type="text" name="url" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" value="Add gallary" class="btn btn-success float-right">
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
