<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamType;

class ExamTypeController extends Controller
{
    public function ViewExamType() {
        $data['allData'] = ExamType::all();
        return view('backend.setup.exam_type.view', $data);
    }

    public function AddExamType() {
        return view('backend.setup.exam_type.add');
    }

    public function StoreExamType(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|unique:exam_types',
        ]);

        $data = new ExamType();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Exam Type successfully added',
            'alert-type' => 'success',
        );

        return redirect()->route('exam.type.view')->with($notification);
    }

    public function EditExamType($id) {
        $editData = ExamType::find($id);
        return view('backend.setup.exam_type.edit', compact('editData'));
    }

    public function UpdateExamType(Request $request, $id) {
        $data = ExamType::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:exam_types',
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Exam type successfully updated',
            'alert-type' => 'success',
        );

        return redirect()->route('exam.type.view')->with($notification);
    }

    public function DeleteExamType($id) {
        ExamType::find($id)->delete();

        $notification = array(
            'message' => 'Exam type successfully deleted',
            'alert-type' => 'info',
        );

        return redirect()->route('exam.type.view')->with($notification);
    }
}
