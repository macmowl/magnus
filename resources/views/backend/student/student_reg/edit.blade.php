@extends('admin.admin_master')

@section('admin')
<div class="row justify-content-center">
<div class="col-12 col-lg-6">
    <section class="content">

         <!-- Basic Forms -->
          <div class="box">
            <div class="box-header with-border">
              <h4 class="box-title">Edit Student</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col">
                    <form method="post" action="{{ route('student.registration.update', $editData->student_id) }}" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{{ $editData->id }}">
                    @csrf
                      <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Student Name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" value="{{ $editData['student']['name'] }}" name="name" class="form-control" required data-validation-required-message="This field is required">
                                            @error('name')
                                                <span class="tet-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Father's name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" value="{{ $editData['student']['father'] }}" name="father" class="form-control" required data-validation-required-message="This field is required">
                                            @error('name')
                                                <span class="tet-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Mother's name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" value="{{ $editData['student']['mother'] }}" name="mother" class="form-control" required data-validation-required-message="This field is required">
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
                                        <h5>Mobile number<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" value="{{ $editData['student']['mobile'] }}" name="mobile" class="form-control">
                                            @error('name')
                                                <span class="tet-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Address<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" value="{{ $editData['student']['address'] }}" name="address" class="form-control">
                                            @error('name')
                                                <span class="tet-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Gender<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="gender" id="gender" required class="form-control">
                                                <option value="">Select gender</option>
                                                <option value="Male" {{ ($editData['student']['gender'] == 'Male') ? "selected" : "" }}>Male</option>
                                                <option value="Female" {{ ($editData['student']['gender'] == 'Female') ? "selected" : "" }}>Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Religion<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="religion" id="religion" required class="form-control">
                                                <option value="">Select religion</option>
                                                <option value="Islam" {{ ($editData['student']['religion'] == 'Islam') ? "selected" : "" }}>Islam</option>
                                                <option value="Christian" {{ ($editData['student']['religion'] == 'Christian') ? "selected" : "" }}>Christian</option>
                                                <option value="Hindu" {{ ($editData['student']['religion'] == 'Hindu') ? "selected" : "" }}>Hindu</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Birth date<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" value="{{ $editData['student']['birthday'] }}" name="birthday" class="form-control">
                                            @error('name')
                                                <span class="tet-danger">{{ $message }}</span>
                                            @enderror
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
                            </div>
                            <div class="row">
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Avatar</h5>
                                        <div class="controls">
                                            <input type="file" name="image" class="form-control" onchange="onFileSelected(event)"> </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="controls">
                                            <img src="{{ !empty($editData['student']['image'])
                                            ? asset('upload/student_images/' . $editData['student']['image'])
                                            : asset('storage/profile-photos/default_avatar.png')
                                    }}" alt="" id="preload_avatar" width="200">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                      </div>

                        <div class="text-xs-right">
                            <button type="submit" class="btn btn-rounded btn-info">Update</button>
                        </div>
                    </form>

                    {{-- <form method="post" action="traitement.php">
                       <div role="group" aria-labelledby="coordonnees">
                           <p id="coordonnees">Vos coordonnées</p> <!-- Titre du fieldset -->
                           <label hidden for="nom">Quel est votre nom ?</label>
                           <input type="text" name="nom" id="nom" aria-required=true aria-label="Quel est votre nom ?" placeholder="Quel est votre nom ?" required/>
                           <label hidden for="prenom">Quel est votre prénom ?</label>
                           <input type="text" name="prenom" id="prenom" aria-required=true aria-label="Quel est votre prénom ?" placeholder="Quel est votre prénom ?" required/>
                            <label hidden for="email">Quel est votre e-mail ?</label>
                           <input type="email" name="email" id="email" aria-required=true aria-label="Quel est votre e-mail ?" placeholder="Quel est votre e-mail ?" required/>
                       </div>
                        <div role="group" aria-labelledby="souhait">
                           <p id="souhait">Votre souhait</p> <!-- Titre du fieldset -->
                            <p>
                               Faites un souhait que vous voudriez voir exaucé :
                               <input type="radio" name="souhait" value="riche" id="riche" /> <label for="riche">Etre riche</label>
                               <input type="radio" name="souhait" value="celebre" id="celebre" /> <label for="celebre">Etre célèbre</label>
                               <input type="radio" name="souhait" value="intelligent" id="intelligent" /> <label for="intelligent">Etre <strong>encore</strong> plus intelligent</label>
                               <input type="radio" name="souhait" value="autre" id="autre" /> <label for="autre">Autre...</label>
                           </p>
                            <p>
                               <label for="precisions">Si "Autre", veuillez préciser :</label>
                               <textarea name="precisions" id="precisions" cols="40" rows="4"></textarea>
                           </p>
                       </div>
                    </form> --}}

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

<script type="text/javascript">
function onFileSelected(event) {
      var selectedFile = event.target.files[0];
      var reader = new FileReader();

      var imgtag = document.getElementById("preload_avatar");
      imgtag.title = selectedFile.name;

      reader.onload = function(event) {
        imgtag.src = event.target.result;
      };

      reader.readAsDataURL(selectedFile);
    }
</script>
@endsection
