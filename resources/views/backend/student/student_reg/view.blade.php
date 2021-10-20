@extends('admin.admin_master')

@section('admin')
<div class="col-12">
    <div class="box bb-3 border-warning">
        <div class="box-header">
            <h4 class="box-title">Bordery</h4>
        </div>
        <div class="box-body">
            <form method="GET" action="{{ route('student.registration.wise')}}">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <h5>Year</h5>
                            <div class="controls">
                                <select name="year_id" id="year_id" required class="form-control">
                                    <option value="">Select year</option>
                                    @foreach($years as $year)
                                        <option value="{{ $year->id }}" {{ (@$year_id == $year->id) ? "selected" : ""}}>{{ $year->name }}</option>
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
                                        <option value="{{ $class->id }}" {{ (@$class_id == $class->id) ? "selected" : "" }}>{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <input type="submit" name="search" value="Search" class="btn btn-rounded btn-dark mb-5">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="box">
    <div class="box-header with-border d-flex justify-content-between">
      <h3 class="box-title">Student list</h3>
      <a href="{{ route('student.registration.add') }}" class="btn btn-rounded btn-success mb-5">Add Student</a>
    </div>
    <div class="box-body">
        <div class="table-responsive">
        {{-- @if (!@search) --}}
          <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>ID number</th>
                    <th>Roll</th>
                    <th>Year</th>
                    <th>Class</th>
                    @if (Auth::user()->role == "Admin")
                    <th>Code</th>
                    @endif
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($allData as $key => $student)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>
                        <img src="{{ $student['student']['image'] != null
                        ? asset('upload/student_images/' . $student['student']['image'])
                        : asset('storage/profile-photos/default_avatar.png')
                        }}" alt="" id="preload_avatar" width="60" class="rounded-circle">
                    </td>
                    <td>{{ $student['student']['name'] }}</td>
                    <td>{{ $student['student']['id_no'] }}</td>
                    <td>{{ $student['student']['roll'] }}</td>
                    <td>{{ $student['student_year']['name'] }}</td>
                    <td>{{ $student['student_class']['name'] }}</td>
                    @if (Auth::user()->role == "Admin")
                    <td>{{ $student['student']['code'] }}</td>
                    @endif
                    <td>
                        <a href="{{ route('student.registration.edit', $student->student_id) }}" class="btn btn-info">Edit</a>
                        <a href="{{ route('student.registration.promotion', $student->student_id) }}" class="btn btn-warning">Promotion</a>
                        <a href="{{ route('student.registration.details', $student->student_id) }}" class="btn btn-primary" target="_blank">PDF</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
          </table>
          {{-- @else
          @endif --}}
        </div>
    </div>
    </div>
</div>
@endsection
