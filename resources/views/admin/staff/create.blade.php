@extends('layouts.admin')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Add staff</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('staff.all')}}">All staff</a></li>
              <li class="breadcrumb-item active">Add staff</li>
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
	<form action="{{route('staff.store')}}" method="POST" enctype="multipart/form-data">
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
                                    <label for="inputName">Fullname</label>
                                    <input type="text" required="required" id="fullname_{{ $translation }}" required="required" value="" name="{{ $translation }}[fullname]"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Position</label>
                                    <input type="text" required="required" id="position_{{ $translation }}" required="required" value="" name="{{ $translation }}[position]"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Work days</label>
                                    <input type="text" id="work_days_{{ $translation }}" required="required" value="" name="{{ $translation }}[work_days]"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="description_{{ $translation }}">Excerpt</label>
                                    <textarea id="description_{{ $translation }}" class="form-control" value="" name="{{ $translation }}[description]" rows="4"></textarea>
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
                <label for="inputStatus">Email</label>
                <input type="text" name="email" value="" required class="form-control">
              </div>
              <div class="form-group">
                <label for="inputStatus">Phone</label>
                <input type="tel" name="phone" value="" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputStatus">Phone 2</label>
                <input type="tel" name="phone2" value="" class="form-control">
              </div>
                <div class="form-group">
                    <label for="inputStatus">Order</label>
                    <input type="number" name="order" value="" class="form-control">
                </div>
              <div class="form-group">
                <input type="submit" value="Add staff" class="btn btn-success float-right">
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
