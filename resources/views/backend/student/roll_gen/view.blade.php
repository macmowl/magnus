@extends('admin.admin_master')

@section('admin')
<div class="col-12">
    <div class="box bb-3 border-warning">
        <div class="box-header">
            <h4 class="box-title">Student roll generator</h4>
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
                        <a href="" id="search" class="btn btn-primary" name="search">Search</a>
                    </div>
                </div>
                {{-- Roll generate Table --}}
                <div class="row d-none" id="roll-generate">
                    <div class="col-12">
                        <table class="table table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID no</th>
                                    <th>Student name</th>
                                    <th>Father name</th>
                                    <th>Gender</th>
                                    <th>Roll</th>
                                </tr>
                            </thead>
                            <tbody id="roll-generate-tr">

                            </tbody>
                        </table>
                    </div>
                </div>
                <input type="submit" class="btn btn-info" value="Roll generator">
            </form>
        </div>
    </div>
</div>
@endsection
