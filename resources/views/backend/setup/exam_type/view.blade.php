@extends('admin.admin_master')

@section('admin')
<div class="col-12">

    <div class="box">
    <div class="box-header with-border d-flex justify-content-between">
      <h3 class="box-title">Exam Type list</h3>
      <a href="{{ route('exam.type.add') }}" class="btn btn-rounded btn-success mb-5">Add Exam Type</a>
    </div>
    <div class="box-body">
        <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($allData as $key => $examType)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $examType->name }}</td>
                    <td>
                        <a href="{{ route('exam.type.edit', $examType->id) }}" class="btn"><i class="fa fa-edit" aria-hidden="true"></i></a>
                        <a href="{{ route('exam.type.delete', $examType->id) }}" id="delete" class="btn"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </tfoot>
          </table>
        </div>
    </div>
    </div>
</div>
@endsection
