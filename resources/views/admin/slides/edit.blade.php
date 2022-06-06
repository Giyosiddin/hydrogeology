@extends('layouts.admin')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Update slide</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('slider.all')}}">All slides</a></li>
              <li class="breadcrumb-item active">Update slide</li>
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
	<form action="{{route('slider.update', $slide->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
      <div class="row">
        <div class="col-md-9">
            <div class="card card-primary card-tabs">
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                    <div class="tab-pane fade show active">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Name uz</label>
                                <input type="text" required="required" id="" required="required" value="{{$slide->name_uz}}" name="name_uz"  class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Name en</label>
                                <input type="text" required="required" id="" required="required" value="{{$slide->name_en}}" name="name_en"  class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Name ru</label>
                                <input type="text" required="required" id="" required="required" value="{{$slide->name_ru}}" name="name_ru"  class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Link</label>
                                <input type="text" required="required" id="" required="required" value="{{$slide->url}}" name="url"  class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          <!-- /.card -->
        </div>
        <div class="col-md-3">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Others</h3>
            </div>
            <div class="card-body">
              <div class="img"><a class=""><img src="{{\Storage::url($slide->image)}}" alt=""></a></div>
              <div class="form-group row" >
                <div class="dropzone col mt-2">
                  <div><i class="fas fa-plus"></i> <span>Photo</span></div>
                  <input type="file" name="image" id="image" class="form-control" value="{{old($slide->image)}}">
                  <input type="hidden" name="delete_image" id="delete_image" value="@if(!empty($slide->image)) {{$slide->image}} @endif">
                </div>
                <div class="col mt-2 ">
                  <a href="#" class="btn btn-success w-100 pt-1 delete_file"><i class="fas fa-times"></i> <span>Delete</span></a>
                </div>
              </div>
              <div class="form-group">
                <input type="submit" value="Update slide" class="btn btn-success float-right">
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
