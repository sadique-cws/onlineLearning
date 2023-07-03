@extends('admin.base')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ ($update) ? "Update" : "Insert" }} Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category</a></li>
              <li class="breadcrumb-item active">Add New</li>
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
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Add</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ ($update)? route('category.update',$category) : route('category.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @if($update)
                 @method('put')
                 @endif

                <div class="card-body">
                 <div class="row">
                  <div class="form-group col-lg-6">
                    <label for="title">Category Title</label>
                    <input type="text" name="cat_title" class="form-control" id="cat_title" placeholder="Enter cat_title" value="{{ ($update)? $category->cat_title : old('title') }}"/>
                    @error('cat_title')
                        <p class="small text-danger">{{ $message }}</p>
                    @enderror
                  </div>


                </div>

                </div>

                              <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">{{($update) ? "Update": "Create"}}</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->

          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
