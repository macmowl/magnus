@extends('admin.admin_master')

@section('admin')
<div class="row justify-content-center">
<div class="col-12 col-lg-8">
    <section class="content">

         <!-- Basic Forms -->
          <div class="box">
            <div class="box-header with-border">
              <h4 class="box-title">Edit Assign Subject</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col">
                    <form method="post" action="{{ route('assign.subject.update', $editData[0]->class_id) }}">
                    @csrf
                      <div class="row">
                        <div class="col-12 add_item">
                            <div class="form-group">
                                <h5>Class <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="class_id" id="select" required class="form-control">
                                        <option value="" disabled="">Select Class</option>
                                        @foreach($classes as $class)
                                            <option value="{{ $class->id }}" {{ ($editData['0']->class_id == $class->id) ? "selected" : "" }}>{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @foreach($editData as $edit)
                            <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                                <div class="row">
                                    <div class="col col-md-4">
                                        <div class="form-group">
                                            <h5>Student subject <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="subject_id[]" id="select" required class="form-control">
                                                    <option value="" disabled="">Select subject</option>
                                                    @foreach($subjects as $subject)
                                                        <option value="{{ $subject->id }}" {{ ($edit->subject_id == $subject->id) ? "selected" : "" }}>{{ $subject->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col col-md-2">
                                        <div class="form-group">
                                            <h5>Full mark <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="full_mark[]" class="form-control" value="{{ $edit->full_mark }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col col-md-2">
                                        <div class="form-group">
                                            <h5>Pass mark <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="pass_mark[]" class="form-control" value="{{ $edit->pass_mark }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col col-md-2">
                                        <div class="form-group">
                                            <h5>Subjective mark <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="subjective_mark[]" class="form-control" value="{{ $edit->subjective_mark }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col col-md-2 pt-20">
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
                        <div class="col col-md-4">
                            <div class="form-group">
                                <h5>Student subject <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="subject_id[]" id="select" required class="form-control">
                                        <option value="" disabled="">Select subject</option>
                                        @foreach($subjects as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col col-md-2">
                            <div class="form-group">
                                <h5>Full mark <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="full_mark[]" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="col col-md-2">
                            <div class="form-group">
                                <h5>Pass mark <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="pass_mark[]" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="col col-md-2">
                            <div class="form-group">
                                <h5>Subjective mark <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="subjective_mark[]" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="col col-md-2 pt-20">
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
