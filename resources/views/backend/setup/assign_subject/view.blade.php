@extends('admin.admin_master')

@section('admin')
<div class="col-12">

    <div class="box">
    <div class="box-header with-border d-flex justify-content-between">
      <h3 class="box-title">Assign Subjects list</h3>
      <a href="{{ route('assign.subject.add') }}" class="btn btn-rounded btn-success mb-5">Add Assign Subject</a>
    </div>
    <div class="box-body">
        <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Class</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($allData as $key => $assign)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $assign['student_class']['name'] }}</td>
                    <td>
                        <a href="{{ route('assign.subject.edit', $assign->class_id) }}" class="btn"><i class="fa fa-edit" aria-hidden="true"></i></a>
                        <a href="{{ route('assign.subject.details', $assign->class_id) }}" class="btn">Details</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>SL</th>
                    <th>Fee category</th>
                    <th>Action</th>
                </tr>
            </tfoot>
          </table>
        </div>
    </div>
    </div>
</div>
@endsection
