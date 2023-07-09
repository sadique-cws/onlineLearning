@extends('admin.base')

@section('content')
        <!-- Main content -->
        <div class="content-wrapper">
          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Manage Payments ({{ count($payments) }})</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Manage Payments</li>
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
                    <th>txn id</th>
                    <th>order</th>
                    <th>course name</th>
                    <th>student name</th>
                    <th>Contact</th>
                    <th>amount</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($payments as $item)

                      <tr>
                          <td>{{ $item->transaction_id }}</td>
                          <td>{{ $item->order_id }}</td>
                          <td>{{ $item->course->title }}</td>
                          <td>{{ $item->name }}</td>
                          <td>{{ $item->user->mobile }}</td>
                          <td>{{ $item->fee }}</td>
                          <td>{{ ($item->status)? "Paid" : "Pending" }}</td>
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
