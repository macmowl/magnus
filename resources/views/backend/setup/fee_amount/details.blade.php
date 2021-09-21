@extends('admin.admin_master')

@section('admin')
<div class="col-12">

    <div class="box">
    <div class="box-header with-border d-flex justify-content-between">
      <h3 class="box-title">Fee Amount Details</h3>
      <a href="{{ route('fee.amount.add') }}" class="btn btn-rounded btn-success mb-5">Add Fee Amount</a>
    </div>
    <div class="box-body">
        <h4><strong>{{ $detailsData[0]['fee_category']['name'] }}</strong></h4>
        <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped">
            <thead class="thead-light">
                <tr>
                    <th>SL</th>
                    <th>Class name</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
            @foreach($detailsData as $key => $detail)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $detail['student_class']['name'] }}</td>
                    <td>{{ $detail->amount }}</td>
                </tr>
            @endforeach
            </tbody>
          </table>
        </div>
    </div>
    </div>
</div>
@endsection
