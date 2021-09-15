<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentYear;

class StudentYearController extends Controller
{
    public function ViewYear() {
            $data['allData'] = StudentYear::all();
            return view('backend.setup.student_year.view_year', $data);
    }

    public function AddYear() {
        return view('backend.setup.student_year.add_year');
    }

    public function YearStore(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|unique:student_years',
        ]);

        $data = new StudentYear();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Year successfully added',
            'alert-type' => 'success',
        );

        return redirect()->route('student.year.view')->with($notification);
    }

    public function EditStudentYear($id) {
        $editData = StudentYear::find($id);
        return view('backend.setup.student_year.edit_year', compact('editData'));
    }

    public function StudentYearUpdate(Request $request, $id) {
        $data = StudentYear::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:student_years',
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Year successfully updated',
            'alert-type' => 'success',
        );

        return redirect()->route('student.year.view')->with($notification);
    }

    public function StudentYearDelete($id) {
        StudentYear::find($id)->delete();

        $notification = array(
            'message' => 'Student Year successfully deleted',
            'alert-type' => 'info',
        );

        return redirect()->route('student.class.view')->with($notification);
    }
}
