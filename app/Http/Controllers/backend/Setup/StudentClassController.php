<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;

class StudentClassController extends Controller
{
    public function ViewStudent() {
        $data['allData'] = StudentClass::all();
        return view('backend.setup.student_class.view_class', $data);
    }

    public function AddStudentClass() {
        return view('backend.setup.student_class.add_class');
    }

    public function StudentClassStore(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|unique:student_classes',
        ]);

        $data = new StudentClass();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Class Name successfully added',
            'alert-type' => 'success',
        );

        return redirect()->route('student.class.view')->with($notification);
    }

    public function EditStudentClass($id) {
        $editData = StudentClass::find($id);
        return view('backend.setup.student_class.edit_class', compact('editData'));
    }

    public function StudentClassUpdate(Request $request, $id) {
        $data = StudentClass::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:student_classes',
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Class Name successfully updated',
            'alert-type' => 'success',
        );

        return redirect()->route('student.class.view')->with($notification);
    }

    public function StudentClassDelete($id) {
        StudentClass::find($id)->delete();

        $notification = array(
            'message' => 'Student Class Name successfully deleted',
            'alert-type' => 'info',
        );

        return redirect()->route('student.class.view')->with($notification);
    }
}












