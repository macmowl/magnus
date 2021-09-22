<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolSubject;

class SchoolSubjectController extends Controller
{
    public function ViewSchoolSubject() {
        $data['allData'] = SchoolSubject::all();
        return view('backend.setup.school_subject.view', $data);
    }

    public function AddSchoolSubject() {
        return view('backend.setup.school_subject.add');
    }

    public function StoreSchoolSubject(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|unique:school_subjects',
        ]);

        $data = new SchoolSubject();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'School Subject successfully added',
            'alert-type' => 'success',
        );

        return redirect()->route('school.subject.view')->with($notification);
    }

    public function EditSchoolSubject($id) {
        $editData = SchoolSubject::find($id);
        return view('backend.setup.school_subject.edit', compact('editData'));
    }

    public function UpdateSchoolSubject(Request $request, $id) {
        $data = SchoolSubject::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:school_subjects',
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'School Subject successfully updated',
            'alert-type' => 'success',
        );

        return redirect()->route('school.subject.view')->with($notification);
    }

    public function DeleteSchoolSubject($id) {
        SchoolSubject::find($id)->delete();

        $notification = array(
            'message' => 'School Subject successfully deleted',
            'alert-type' => 'info',
        );

        return redirect()->route('school.subject.view')->with($notification);
    }
}
