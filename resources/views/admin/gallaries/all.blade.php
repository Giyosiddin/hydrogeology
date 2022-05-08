@extends('layouts.admin')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
      		<h1>Gallaries</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Gallaries</li>
            </ol>
          </div>
        </div>
        @if(session('msg'))
          <div class="row justify-content-center">
            <div class="col-md-11">
              <div class="alert alert-success" role="alert">
                {{session()->get('msg')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            </div>
          </div>
        @endif
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Gallaries</h3>

          <div class="card-tools">
            <a href="{{route('gallary.create')}}" class="btn btn-block btn-success btn-flat"> Add gallary</a>
          </div>
        </div>
        <div class="card-body p-0">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="images-tab" data-toggle="tab" href="#images" role="tab" aria-controls="images" aria-selected="true">Images</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="videos-tab" data-toggle="tab" href="#videos" role="tab" aria-controls="videos" aria-selected="false">Videos</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="images" role="tabpanel" aria-labelledby="images-tab">
                    @include('admin.components.galllert-table', ['gallaries' =>  $image_gallaries])
                </div>
                <div class="tab-pane fade" id="videos" role="tabpanel" aria-labelledby="videos-tab">
                     @include('admin.components.galllert-table', ['gallaries' =>  $video_gallaries])
                </div>
            </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
