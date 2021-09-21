@extends('admin.admin_master')

@section('admin')
<div class="col-12">

    <div class="box">
    <div class="box-header with-border d-flex justify-content-between">
      <h3 class="box-title">Fee Amount list</h3>
      <a href="{{ route('fee.amount.add') }}" class="btn btn-rounded btn-success mb-5">Add Fee Amount</a>
    </div>
    <div class="box-body">
        <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Fee category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($allData as $key => $amount)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $amount['fee_category']['name'] }}</td>
                    <td>
                        <a href="{{ route('fee.amount.edit', $amount->fee_category_id) }}" class="btn"><i class="fa fa-edit" aria-hidden="true"></i></a>
                        <a href="{{ route('fee.amount.details', $amount->fee_category_id) }}" class="btn">Details</a>
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
