@extends('admin.admin_master')

@section('admin')
<div class="row justify-content-center">
<div class="col-12 col-lg-6">
    <section class="content">

         <!-- Basic Forms -->
          <div class="box">
            <div class="box-header with-border">
              <h4 class="box-title">Promote Student</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col">
                    <form method="post" action="{{ route('student.registration.promoupdate', $editData->student_id) }}" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{{ $editData->id }}">
                    @csrf
                      <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Year</h5>
                                        <div class="controls">
                                            <select name="year_id" id="year_id" required class="form-control">
                                                <option value="">Select year</option>
                                                @foreach($years as $year)
                                                    <option value="{{ $year->id }}" {{ ($editData->year_id == $year->id) ? "selected" : "" }}>{{ $year->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Class</h5>
                                        <div class="controls">
                                            <select name="class_id" id="class_id" required class="form-control">
                                                <option value="">Select class</option>
                                                @foreach($classes as $class)
                                                    <option value="{{ $class->id }}" {{ ($editData->class_id == $class->id) ? "selected" : "" }}>{{ $class->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Discount<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" value="{{ $editData['discount']['discount'] }}" name="discount" class="form-control">
                                            @error('name')
                                                <span class="tet-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Group</h5>
                                        <div class="controls">
                                            <select name="group_id" id="group_id" required class="form-control">
                                                <option value="">Select group</option>
                                                @foreach($groups as $group)
                                                    <option value="{{ $group->id }}" {{ ($editData->group_id == $group->id) ? "selected" : "" }}>{{ $group->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Shift<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="shift_id" id="shift_id" required class="form-control">
                                                <option value="">Select shift</option>
                                                @foreach($shifts as $shift)
                                                    <option value="{{ $shift->id }}" {{ ($editData->shift_id == $shift->id) ? "selected" : "" }}>{{ $shift->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>

                        <div class="text-xs-right">
                            <button type="submit" class="btn btn-rounded btn-info">Promote</button>
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
