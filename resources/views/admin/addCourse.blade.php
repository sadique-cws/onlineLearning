@extends('admin.base')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ ($update) ? "Update" : "Insert" }} Courses</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">Course</a></li>
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
              <form action="{{ ($update)? route('courses.update',$course) : route('courses.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @if($update)
                 @method('put')
                 @endif

                <div class="card-body">
                 <div class="row">
                  <div class="form-group col-lg-6">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Enter title" value="{{ ($update)? $course->title : old('title') }}"/>
                    @error('title')
                        <p class="small text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-group col-lg-6">
                    <label for="start_at">Start At</label>
                    <input type="date" name="start_date" class="form-control" id="start_at" placeholder="Enter start_at" value="{{ ($update)? $course->start_date : old('start_date') }}"/>
                    @error('start_date')
                        <p class="small text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                 </div>
                  <div class="row">
                    <div class="form-group col">
                        <label for="duration">Duration in (week)</label>
                        <input type="number" name="duration" class="form-control" id="duration" placeholder="Enter duration" value="{{ ($update)? $course->duration : old('duration') }}"/>
                        @error('duration')
                            <p class="small text-danger">{{ $message }}</p>
                        @enderror
                      </div>
                      <div class="form-group col">
                        <label for="category">Category</label>
                        <select name="category" class="form-control" id="category">
                            <option value="{{ ($update)? $course->category->id : "" }}"> {{ ($update)? $course->category->cat_title : "select category" }}</option>
                            <option value="" disabled>----------------------</option>

                            @foreach ($category as $item)
                                <option value="{{$item->id}}">{{$item->cat_title}}</option>
                            @endforeach

                        </select>
                        @error('category')
                            <p class="small text-danger">{{ $message }}</p>
                        @enderror
                      </div>
                  </div>
                 <div class="row">
                  <div class="form-group col-lg-6">
                    <label for="fees">Fees</label>
                    <input type="number" name="fees" class="form-control" id="fees" placeholder="Enter fees" value="{{ ($update)? $course->fees : old('fees') }}"/>
                    @error('fees')
                        <p class="small text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-group col-lg-6">
                    <label for="discount_fees">Discount Fees</label>
                    <input type="number" name="discount_fees" class="form-control" id="discount_fees" placeholder="Enter discount_fees"  value="{{ ($update)? $course->discount_fees : old('discount_fees') }}"/>
                    @error('discount_fees')
                        <p class="small text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                 </div>

                  <div class="row">
                    <div class="form-group col-lg-10">
                      <label for="exampleInputFile">Image</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" name="image" id="image-input" accept="image/*" onchange="previewImage(event)" class="custom-file-input" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                        </div>
                      </div>
                      <div class="form-group col-lg-12 mt-5">
                        <label for="description">Description</label>
                        <textarea rows="5" name="description" class="form-control" id="description" placeholder="Enter description">{{ $update? $course->description : old('description')  }}</textarea>
                        @error('description')
                            <p class="small text-danger">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>
                  <div class="col-lg-2">
                    <div class="card">
                        <img id="image-preview" src="{{ ($update)? asset('storage/'.$course->image) : 'https://via.placeholder.com/500?text=preview' }} " alt="" class="img-thumbnail">
                    </div>
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

@section('js')
    <script>
              function previewImage(event) {
            var imageInput = event.target;
            var imagePreview = document.getElementById('image-preview');

            if (imageInput.files && imageInput.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                };

                reader.readAsDataURL(imageInput.files[0]);
            }
        }

    </script>
@endsection
