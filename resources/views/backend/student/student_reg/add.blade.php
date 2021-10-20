@extends('admin.admin_master')

@section('admin')
<div class="row justify-content-center">
<div class="col-12 col-lg-6">
    <section class="content">

         <!-- Basic Forms -->
          <div class="box">
            <div class="box-header with-border">
              <h4 class="box-title">Add Student</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col">
                    <form method="post" action="{{ route('student.registration.store') }}" enctype="multipart/form-data">
                    @csrf
                      <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Student Name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control" required data-validation-required-message="This field is required">
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
                                            <input type="text" name="father" class="form-control" required data-validation-required-message="This field is required">
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
                                            <input type="text" name="mother" class="form-control" required data-validation-required-message="This field is required">
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
                                            <input type="text" name="mobile" class="form-control">
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
                                            <input type="text" name="address" class="form-control">
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
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
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
                                                <option value="Islam">Islam</option>
                                                <option value="Christian">Christian</option>
                                                <option value="Hindu">Hindu</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Birth date<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="birthday" class="form-control">
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
                                            <input type="text" name="discount" class="form-control">
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
                                                    <option value="{{ $year->id }}">{{ $year->name }}</option>
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
                                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
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
                                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
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
                                                <option value="">Select year</option>
                                                @foreach($shifts as $shift)
                                                    <option value="{{ $shift->id }}">{{ $shift->name }}</option>
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
                                            <img src="{{ Auth::user()->image != null
                                            ? asset('storage/' . Auth::user()->image)
                                            : asset('storage/profile-photos/default_avatar.png')
                                    }}" alt="" id="preload_avatar" width="200">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                      </div>

                        <div class="text-xs-right">
                            <button type="submit" class="btn btn-rounded btn-info">Add</button>
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
