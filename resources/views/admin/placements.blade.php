@extends('admin.base')

@section('content')
        <!-- Main content -->
        <div class="content-wrapper">
          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Manage Placements ({{ count($placements) }})</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Manage Placements</li>
                  </ol>
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover table-sm">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Company Name</th>
                    <th>Role</th>
                    <th>Type</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($placements as $item)

                      <tr>
                          <td>{{ $item->user->name }}</td>
                          <td>{{ $item->company_name }}</td>
                          <td>{{ $item->role }}</td>
                          <td>{{ $item->job_type }}</td>

                          <td class="d-flex" style="gap: 5px">
                              <form action="{{ route('placement.destroy',$item) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                              </form>
                              <a href='{{ route('category.edit',$item) }}' class="btn btn-info">Edit</a>
                              <a href='' class="btn btn-success">View</a>
                          </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

</div>
@endsection
