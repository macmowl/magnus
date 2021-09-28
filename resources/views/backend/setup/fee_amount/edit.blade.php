@extends('admin.admin_master')

@section('admin')
<div class="row justify-content-center">
<div class="col-12 col-lg-8">
    <section class="content">

         <!-- Basic Forms -->
          <div class="box">
            <div class="box-header with-border">
              <h4 class="box-title">Edit Fee Amount</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col">
                    <form method="post" action="{{ route('fee.amount.update', $editData[0]->fee_category_id) }}">
                    @csrf
                      <div class="row">
                        <div class="col-12 add_item">
                            <div class="form-group">
                                <h5>Fee Category <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="fee_category_id" id="select" required class="form-control">
                                        <option value="" disabled="">Select fee category</option>
                                        @foreach($fee_categories as $cat)
                                            <option value="{{ $cat->id }}" {{ ($editData['0']->fee_category_id == $cat->id) ? "selected" : "" }}>{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @foreach($editData as $edit)
                            <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                                <div class="row">
                                    <div class="col col-md-6">
                                        <div class="form-group">
                                            <h5>Student Class <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="class_id[]" id="select" required class="form-control">
                                                    <option value="" disabled="">Select fee category</option>
                                                    @foreach($classes as $class)
                                                        <option value="{{ $class->id }}" {{ $edit->class_id == $class->id ? "selected" : "" }}>{{ $class->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col col-md-3">
                                        <div class="form-group">
                                            <h5>Amount <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="amount[]" value="{{ $edit->amount }}" class="form-control" required data-validation-required-message="This field is required">
                                                @error('name')
                                                    <span class="tet-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col col-md-3 pt-20">
                                        <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                                        <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
                                    </div>
                                </div>
                            </div>
                            @endforeach

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

<div style="visibility: hidden;">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
            <div class="form-row">
                <div class="col">
                    <hr>
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="form-group">
                                <h5>Student Class <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="class_id[]" id="select" required class="form-control">
                                        <option value="" disabled="">Select fee category</option>
                                        @foreach($classes as $class)
                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col col-md-3">
                            <div class="form-group">
                                <h5>Amount <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="amount[]" class="form-control" required data-validation-required-message="This field is required">
                                    @error('name')
                                        <span class="tet-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col col-md-3 pt-20">
                            <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                            <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

    $(function(){
        let counter = 0;
        $(document).on("click", ".addeventmore", function() {
            console.log('hello');
            let whole_extra_item_add = $("#whole_extra_item_add").html();
            $(this).closest(".add_item").append(whole_extra_item_add);
            counter++;
        });

        $(document).on('click', '.removeeventmore', function() {
            $(this).closest('.delete_whole_extra_item_add').remove();
            counter--;
        });
    });
</script>
@endsection
