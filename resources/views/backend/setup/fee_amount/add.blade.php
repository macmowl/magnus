@extends('admin.admin_master')

@section('admin')
<div class="row justify-content-center">
<div class="col-12 col-lg-6">
    <section class="content">

         <!-- Basic Forms -->
          <div class="box">
            <div class="box-header with-border">
              <h4 class="box-title">Add Fee Amount</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col">
                    <form method="post" action="">
                    @csrf
                      <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <h5>Fee Category <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="fee_category_id" id="select" required class="form-control">
                                        <option value="" disabled="">Select fee category</option>
                                        @foreach($fee_categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Fee Category <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="name" class="form-control" required data-validation-required-message="This field is required">
                                    @error('name')
                                        <span class="tet-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                      </div>

                        <div class="text-xs-right">
                            <button type="submit" class="btn btn-rounded btn-info">Add</button>
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
