@extends('layouts.admin')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
      		<h1>Menu items</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Menu items</li>
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
          <h3 class="card-title">Menu items</h3>

          <div class="card-tools">
            <a href="{{route('menuItem.create', $menu_id)}}" class="btn btn-block btn-success btn-flat"> Add menu</a>
          </div>
        </div>
        <span class="card-body p-0">
          <ul class="list-group">
              <li class="list-group-item active">
                      <span>
                          #
                      </span>
                      <div >
                         Name
                      </div>
                      <div>
                          Url
                      </div>
                      <div>
                      </div>
              </li>
                @foreach($items as $item)
                <li class="list-group-item">
                  <span>
                        #
                    </span>
                    <div clas="col">
                        {{$item->name_uz}}
                    </div>
                    <div clas="col">
                        <strong>{{$item->url }}</strong>
                    </div>
                    <div  clas="col text-right">
                        <a class="btn btn-info btn-sm" href="{{route('menuItem.edit', [$menu_id, $item->id])}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="{{route('menuItem.delete', [$menu_id, $item->id])}}">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </a>
                    </div>
                @if($item->children)
                    @include('admin.components.child-menu',['childs' => $item->children])
                @endif
                </li>
                @endforeach
          </ul>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
