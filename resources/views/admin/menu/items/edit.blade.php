@extends('layouts.admin')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Update menu</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('menu.all')}}">All menus</a></li>
              <li class="breadcrumb-item"><a href="{{route('menuItem.all', $menu_id)}}">All menu items</a></li>
              <li class="breadcrumb-item active">Update menu</li>
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
	<form action="{{route('menuItem.update', [$menu_id, $item->id])}}" method="POST" enctype="multipart/form-data">
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
                                <input type="text" required="required" id="" required="required" value="{{$item->name_uz}}" name="name_uz"  class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Name ru</label>
                                <input type="text" required="required" id="" required="required" value="{{$item->name_ru}}" name="name_ru"  class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Name en</label>
                                <input type="text" required="required" id="" required="required" value="{{$item->name_en}}" name="name_en"  class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Slug</label>
                                <input type="text" required="required" id="" required="required" value="{{$item->url}}" name="url"  class="form-control">
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
                <div class="form-group">
                    <label>Parent item</label>
                    <select class="form-control select2" name="parent_id" style="width: 100%;">
                        <option selected="selected" value="0"> -- Choose parent -- </option>
                        @foreach ($allItems as $parent)
                            <option value="{{$parent->id}}" @if ($parent->id == $item->parent_id)
                                selected
                            @endif>{{$parent->name_uz}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" value="Update post" class="btn btn-success float-right">
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
