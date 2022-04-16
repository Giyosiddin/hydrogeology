@extends('layouts.admin')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Add decision</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('decision.all')}}">All decisions</a></li>
              <li class="breadcrumb-item active">Add decision</li>
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
	<form action="{{route('decision.store')}}" method="POST" enctype="multipart/form-data">
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
                @foreach(['uz','ru','en'] as $translation)
                    <li class="nav-item">
                        <a class="nav-link @if($nav==1) active @endif" id="locale-{{ $translation}}-tab" data-toggle="pill" href="#locale-{{ $translation}}" role="tab" aria-controls="locale-{{ $translation}}" aria-selected="true">{{ ucfirst($translation) }}</a>
                    </li>
                    @php
                        $nav++;
                    @endphp
                @endforeach
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                   @foreach(['uz','ru','en'] as $translation)
                        <div class="tab-pane fade @if($tab==1) show active @endif" id="locale-{{ $translation }}" role="tabpanel" aria-labelledby="locale-{{ $translation }}-tab">
                            <div class="card-header">
                                <h3 class="card-title">Tanlangan til - {{ ucfirst($translation) }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                <label for="inputName">Title</label>
                                <input type="text" required="required" id="title_{{ $translation }}" required="required" value="" name="{{ $translation }}[title]"  class="form-control">
                                </div>
                                <div class="form-group">
                                <label for="description_{{ $translation }}">Excerpt</label>
                                <textarea id="description_{{ $translation }}" class="form-control" name="{{ $translation }}[description]" rows="4"></textarea>
                                </div>
                                <div class="form-group">
                                <label for="body_{{ $translation }}">Body</label>
                                <textarea id="body_{{ $translation }}" class="form-control ckeditor" required="required" name="{{ $translation }}[body]" rows="4"></textarea>
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
              <div class="img"><a class=""><img src="" alt=""></a></div>
              <div class="form-group row" >
                <div class="dropzone col mt-2">
                  <div><i class="fas fa-plus"></i> <span>Photo</span></div>
                  <input type="file" name="image" id="image" class="form-control">
                </div>
                <div class="col mt-2 ">
                  <a href="#" class="btn btn-success w-100 pt-1 delete_file"><i class="fas fa-times"></i> <span>Delete</span></a>
                </div>
              </div>
              <div class="form-group">
                <label for="inputStatus">Slug</label>
                <input type="text" name="slug" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputStatus">Number decision</label>
                <input type="text" name="number_decision" class="form-control">
              </div>
              <div class="form-group">
                <input type="submit" value="Add post" class="btn btn-success float-right">
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
