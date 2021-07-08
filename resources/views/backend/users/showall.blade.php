@extends('admin.admin_master')

@section('admin')
<div class="col-12">

    <div class="box">
    <div class="box-header with-border d-flex justify-content-between">
      <h3 class="box-title">Users list</h3>
      <a href="{{ route('user.new') }}" class="btn btn-rounded btn-success mb-5">Add user</a>
    </div>
    <div class="box-body">
        <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Role</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $key => $user)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="" class="btn"><i class="fa fa-edit" aria-hidden="true"></i></a>
                        <a href="" class="btn"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>SL</th>
                    <th>Role</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </tfoot>
          </table>
        </div>
    </div>
    </div>
</div>
@endsection
