@extends('admin.base')

@section('content')
        <!-- Main content -->
        <div class="content-wrapper">
          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Student Projects ({{ count($projects) }})</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Manage Projects</li>
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
                    <th>Project Name</th>
                    <th>Done By</th>
                    <th>Source</th>
                    <th>Description</th>
                    <th>Date</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($projects as $item)

                      <tr>
                          <td>{{ $item->user->name }}</td>
                          <td>{{ $item->project_name }}</td>
                          <td>{{ $item->project_url }}</td>
                          <td>{{ $item->project_description }}</td>
                          <td>{{ date("d/m/Y h:m:i A",strtotime($item->created_at)) }}</td>

                        
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
