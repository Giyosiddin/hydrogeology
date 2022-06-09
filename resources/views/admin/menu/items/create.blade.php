@extends('layouts.admin')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Add menu item</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('menu.all')}}">All items</a></li>
              <li class="breadcrumb-item active">Add menu item</li>
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
	<form action="{{route('menuItem.store',request('menu_id'))}}" method="POST" enctype="multipart/form-data">
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
                                <input type="text" required="required" id="" required="required" value="" name="name_uz"  class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Name ru</label>
                                <input type="text" required="required" id="" required="required" value="" name="name_ru"  class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Name en</label>
                                <input type="text" required="required" id="" required="required" value="" name="name_en"  class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Url</label>
                                <input type="text" required="required" id="" required="required" value="" name="url"  class="form-control">
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
                        @foreach ($items as $item)
                            <option value="{{$item->id}}">{{$item->name_uz}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputName">Order</label>
                    <input type="text" required="required" id="" required="required" value="" name="order"  class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" value="Add item" class="btn btn-success float-right">
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
