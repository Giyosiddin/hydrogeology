@extends('layouts.admin')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit decision </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('decision.all')}}">All decisions</a></li>
              <li class="breadcrumb-item active">Edit decision </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    {{-- {{ dd($post->translations) }} --}}

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
	<form action="{{route('decision.update',$post->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
      <div class="row">
        <div class="col-md-9">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                @php
                    $nav=1;
                    $tab=1;
                @endphp
                @foreach($post->translations as $translation)
                    <li class="nav-item">
                        <a class="nav-link @if($nav==1) active @endif" id="locale-{{ $translation->locale }}-tab" data-toggle="pill" href="#locale-{{ $translation->locale }}" role="tab" aria-controls="locale-{{ $translation->locale }}" aria-selected="true">{{ ucfirst($translation->locale) }}</a>
                    </li>
                    @php
                        $nav++;
                    @endphp
                @endforeach
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                    @foreach($post->translations as $translation)
                        <div class="tab-pane fade @if($tab==1) show active @endif" id="locale-{{ $translation->locale }}" role="tabpanel" aria-labelledby="locale-{{ $translation->locale }}-tab">
                            <div class="card-header">
                                <h3 class="card-title">Tanlangan til - {{ ucfirst($translation->locale) }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                <label for="inputName">Title</label>
                                <input type="text" required="required" id="title_{{ $translation->locale }}" required="required" value="{{$translation->title}}" name="{{ $translation->locale }}[title]"  class="form-control">
                                </div>
                                <div class="form-group">
                                <label for="description_{{ $translation->locale }}">Excerpt</label>
                                <textarea id="description_{{ $translation->locale }}" class="form-control" name="{{ $translation->locale }}[description]" rows="4">{{$translation->description}}</textarea>
                                </div>
                                <div class="form-group">
                                <label for="body_{{ $translation->locale }}">Body</label>
                                <textarea id="body_{{ $translation->locale }}" class="form-control ckeditor" required="required" name="{{ $translation->locale }}[body]" rows="4">{{$translation->body}}</textarea>
                                </div>
                            </div>
                        </div>
                        @php
                            $tab++;
                        @endphp
                    @endforeach
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
              {{-- <div class="img"><a class=""><img src="{{\Storage::url($post->image)}}" alt=""></a></div>
              <div class="form-group row" >
                <div class="dropzone col mt-2">
                  <div><i class="fas fa-plus"></i> <span>Photo</span></div>
                  <input type="file" name="image" id="image" class="form-control">
                  <input type="hidden" name="delete_image" id="delete_image" value="@if(!empty($post->image)) {{$post->image}} @endif">
                </div>
                <div class="col mt-2 ">
                  <a href="#" class="btn btn-success w-100 pt-1 delete_file"><i class="fas fa-times"></i> <span>Delete</span></a>
                </div>
              </div> --}}
                <div class="form-group">
                  <label for="inputStatus">Slug</label>
                  <input type="text" disabled name="slug" value="{{$post->slug}}" class="form-control">
                </div>
              <div class="form-group">
                <label for="">Number decision</label>
                <input type="text" name="number_decision" value="{{$post->number_decision}}" class="form-control">
              </div>
              <div class="form-group">
                <input type="submit" value="Update decision" class="btn btn-success float-right">
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
