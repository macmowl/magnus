@extends('admin.admin_master')

@section('admin')
<div class="row justify-content-center">
<div class="col-5">
    <section class="content">

         <!-- Basic Forms -->
          <div class="box">
            <div class="box-header with-border">
              <h4 class="box-title">Edit user</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col">
                    <form method="post" action="{{ route('user.edit', $user->id)}}">
                    @csrf
                      <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <h5>Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="name" value="{{ $user->name }}" class="form-control" required data-validation-required-message="This field is required"> </div>
                            </div>
                            <div class="form-group">
                                <h5>User Role <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="role" id="select" required class="form-control">
                                        <option value="">Select role</option>
                                        <option value="Admin" {{ $user->role == 'Admin' ? "selected" : null }} >Admin</option>
                                        <option value="User" {{ $user->role == 'Operator' ? "selected" : null }}>Operator</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Email <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="email" name="email" value="{{ $user->email }}" class="form-control" required data-validation-required-message="This field is required"> </div>
                            </div>
                        </div>
                      </div>

                        <div class="text-xs-right">
                            <button type="submit" class="btn btn-rounded btn-info">Update</button>
                        </div>
                    </form>

                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </section>

</div>
</div>
@endsection
