@extends('admin.admin_master')

@section('admin')
<div class="row justify-content-center">
<div class="col-6">
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
                    <form method="post" action="{{ route('profile.update')}}" enctype="multipart/form-data">
                    @csrf
                      <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <h5>Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="name" value="{{ $user->name }}" class="form-control" required data-validation-required-message="This field is required"> </div>
                            </div>
                            <div class="form-group">
                                <h5>Email <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="email" name="email" value="{{ $user->email }}" class="form-control" required data-validation-required-message="This field is required"> </div>
                            </div>
                            <div class="form-group">
                                <h5>Avatar</h5>
                                <div class="controls">
                                    <input type="file" name="profile_photo_path" value="{{ $user->profile_photo_path }}" class="form-control" onchange="onFileSelected(event)"> </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <img src="{{ Auth::user()->profile_photo_path != null
                                    ? asset('storage/' . Auth::user()->profile_photo_path)
                                    : asset('storage/profile-photos/default_avatar.png')
                            }}" alt="" id="preload_avatar" width="200">
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>User Role <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="role" id="select" required class="form-control">
                                        <option value="">Select role</option>
                                        <option value="Admin" {{ $user->role == "Admin" ? "selected" : null }} >Admin</option>
                                        <option value="User" {{ $user->role == "User" ? "selected" : null }}>User</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Gender</h5>
                                <div class="demo-radio-button">
                                    <input name="gender" type="radio" id="radio_1" value="Male" {{ $user->gender == 'Male' ? "checked" : null }} />
                                    <label for="radio_1">Male</label>
                                    <input name="gender" type="radio" id="radio_2" value="Female" {{ $user->gender == 'Female' ? "checked" : null }} />
                                    <label for="radio_2">Female</label>
                                    <input name="gender" type="radio" id="radio_1" value="Not specified" {{ $user->gender == 'Not specified' ? "checked" : null }} />
                                    <label for="radio_1">Not specified</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Mobile</h5>
                                <div class="controls">
                                    <input type="number" name="mobile" value="{{ $user->mobile }}" class="form-control" > </div>
                            </div>
                            <div class="form-group">
                                <h5>Address</h5>
                                <div class="controls">
                                    <input type="text" name="address" value="{{ $user->address }}" class="form-control" > </div>
                            </div>
                            <div class="form-group">
                                <h5>Status</h5>
                                <div class="controls">
                                    <input type="text" name="status" value="{{ $user->name }}" class="form-control" > </div>
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
    <div class="col-6">
        <section class="content">

         <!-- Basic Forms -->
          <div class="box">
            <div class="box-header with-border">
              <h4 class="box-title">Update password</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col">
                    <form method="post" action="{{ route('password.update') }}">
                    @csrf
                      <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <h5>Current password <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="password" id="current_password" name="current_password" class="form-control" required> </div>
                                    @error('current_password')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <h5>Set new password <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="password" id="password" name="password" class="form-control" required data-validation-required-message="This field is required"> </div>
                                    @error('password')
                                        <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <h5>Confirm password <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required> </div>
                                    @error('password_confirmation')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
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

<script type="text/javascript">
    function onFileSelected(event) {
          var selectedFile = event.target.files[0];
          var reader = new FileReader();

          var imgtag = document.getElementById("preload_avatar");
          imgtag.title = selectedFile.name;

          reader.onload = function(event) {
            imgtag.src = event.target.result;
          };

          reader.readAsDataURL(selectedFile);
        }
</script>
@endsection
