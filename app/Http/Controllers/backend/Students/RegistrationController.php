<?php

namespace App\Http\Controllers\backend\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\User;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\Subject;
use App\Models\Shift;
use App\Models\DiscountStudent;
use DB;
use Image;
use PDF;

class RegistrationController extends Controller
{
    public function ViewRegistration() {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['year_id'] = StudentYear::orderBy('id', 'desc')->first()->id;
        $data['class_id'] = StudentClass::orderBy('id', 'desc')->first()->id;
        $data['allData'] = AssignStudent::where('year_id', $data['year_id'])->where('class_id', $data['class_id'])->get();
        return view('backend.student.student_reg.view', $data);
    }

    public function AddRegistration() {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = Subject::all();
        $data['shifts'] = Shift::all();
        return view('backend.student.student_reg.add', $data);
    }

    public function StoreRegistration(Request $request) {
        DB::transaction(function() use($request) {
            $checkYear = StudentYear::find($request->year_id)->name;
            $student = User::where('usertype', 'Student')->orderBy('id', 'DESC')->first();

            if ($student == null) {
                $firstReg = 0;
                $studentId = $firstReg + 1;
                if ($studentId < 10) {
                    $id_no = '000' . $studentId;
                } elseif ($studentId < 100) {
                    $id_no = '00' . $studentId;
                } elseif ($studentId < 1000) {
                    $id_no = '0' . $studentId;
                }
            } else {
                $student = User::where('usertype', 'Student')->orderBy('id', 'DESC')->first()->id;
                $studentId = $student + 1;
                if ($studentId < 10) {
                    $id_no = '000' . $studentId;
                } elseif ($studentId < 100) {
                    $id_no = '00' . $studentId;
                } elseif ($studentId < 1000) {
                    $id_no = '0' . $studentId;
                }
            }

            $final_id_no = $checkYear.$id_no;
            $user = new User();
            $code = rand(0000, 9999);
            $user->id_no = $final_id_no;
            $user->password = bcrypt($code);
            $user->usertype = 'Student';
            $user->code = $code;
            $user->name = $request->name;
            $user->father = $request->father;
            $user->mother = $request->mother;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->birthday = date('Y-m-d', strtotime($request->dob));

            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/student_images'), $filename);
                $user['image'] = $filename;
            }
            $user->save();

            $assign_student = new AssignStudent();
            $assign_student->student_id = $user->id;
            $assign_student->year_id = $request->year_id;
            $assign_student->class_id = $request->class_id;
            $assign_student->shift_id = $user->shift_id;
            $assign_student->group_id = $user->group_id;
            $assign_student->save();

            $discount_student = new DiscountStudent();
            $discount_student->assign_student_id = $assign_student->id;
            $discount_student->fee_category_id = '1';
            $discount_student->discount = $request->discount;
            $discount_student->save();
        });

        $notification = array(
            'message' => 'Student successfully added',
            'alert-type' => 'success'
        );
        return Redirect()->route('registration.view')->with($notification);
    }

    public function WiseRegistration(Request $request) {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['year_id'] = $request->year_id;
        $data['class_id'] = $request->class_id;
        $data['allData'] = AssignStudent::where('year_id', $data['year_id'])->where('class_id', $data['class_id'])->get();
        return view('backend.student.student_reg.view', $data);
    }

    public function EditRegistration($id) {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = Subject::all();
        $data['shifts'] = Shift::all();
        $data['editData'] = AssignStudent::with(['student', 'discount'])->where('student_id', $id)->first();
        return view('backend.student.student_reg.edit', $data);
    }

    public function UpdateRegistration(Request $request, $student_id) {
        DB::transaction(function() use($request, $student_id) {
            $checkYear = StudentYear::find($request->year_id)->name;

            $user = User::where('id', $student_id)->first();
            $user->name = $request->name;
            $user->father = $request->father;
            $user->mother = $request->mother;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->birthday = date('Y-m-d', strtotime($request->dob));

            if ($request->file('image')) {
                $file = $request->file('image');
                @unlink(public_path('upload/student_images/' . $user->image));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/student_images'), $filename);
                $user['image'] = $filename;
            }
            $user->save();

            $assign_student = AssignStudent::where('id', $request->id)->where('student_id', $student_id)->first();
            $assign_student->year_id = $request->year_id;
            $assign_student->class_id = $request->class_id;
            $assign_student->shift_id = $user->shift_id;
            $assign_student->group_id = $user->group_id;
            $assign_student->save();

            $discount_student = DiscountStudent::where('assign_student_id', $request->id)->first();
            $discount_student->discount = $request->discount;
            $discount_student->save();
        });

        $notification = array(
            'message' => 'Student successfully updated',
            'alert-type' => 'success'
        );
        return Redirect()->route('registration.view')->with($notification);
    }

    public function PromoteRegistration($student_id) {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = Subject::all();
        $data['shifts'] = Shift::all();
        $data['editData'] = AssignStudent::with(['student', 'discount'])->where('student_id', $student_id)->first();
        return view('backend.student.student_reg.promotion', $data);
    }

    public function PromoteUpdateRegistration(Request $request, $student_id) {
        DB::transaction(function() use($request, $student_id) {
            AssignStudent::where('student_id', $student_id)->delete();
            $assign_student = new AssignStudent();
            $assign_student->student_id = $student_id;
            $assign_student->year_id = $request->year_id;
            $assign_student->class_id = $request->class_id;
            $assign_student->shift_id = $request->shift_id;
            $assign_student->group_id = $request->group_id;
            $assign_student->save();

            $discount_student = new DiscountStudent();
            $discount_student->assign_student_id = $assign_student->id;
            $discount_student->fee_category_id = '1';
            $discount_student->discount = $request->discount;
            $discount_student->save();
        });

        $notification = array(
            'message' => 'Student successfully promoted',
            'alert-type' => 'success'
        );
        return Redirect()->route('registration.view')->with($notification);
    }

    public function DetailsRegistration($student_id) {
        $data['details'] = AssignStudent::with(['student', 'discount'])->where('student_id', $student_id)->first();
        $pdf = PDF::loadView('backend.student.student_reg.details_pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');

    }
}
