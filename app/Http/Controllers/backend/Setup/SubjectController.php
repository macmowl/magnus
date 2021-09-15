<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function ViewSubject() {
        $data['allData'] = Subject::all();
        return view('backend.setup.subject.view_subject', $data);
    }

    public function AddSubject() {
        return view('backend.setup.subject.add_subject');
    }

    public function StoreSubject(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|unique:subjects',
        ]);

        $data = new Subject();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Subject successfully added',
            'alert-type' => 'success',
        );

        return redirect()->route('subject.view')->with($notification);
    }

    public function EditSubject($id) {
        $editData = Subject::find($id);
        return view('backend.setup.subject.edit_subject', compact('editData'));
    }

    public function UpdateSubject(Request $request, $id) {
        $data = Subject::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:subjects',
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Subject successfully updated',
            'alert-type' => 'success',
        );

        return redirect()->route('subject.view')->with($notification);
    }

    public function DeleteSubject($id) {
        Subject::find($id)->delete();

        $notification = array(
            'message' => 'Subject successfully deleted',
            'alert-type' => 'info',
        );

        return redirect()->route('subject.view')->with($notification);
    }
}
